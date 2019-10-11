<!--
==============================+===============================================================
@ File Name : RecentComments.php
@ Author : jopemachine
@ Team : team ⓒ EV for 2019 BottomUp
@ Created Date : 2019-07-14, 18:12:22
@ Desc : 
@    evCommentService.ga에서 블로그에서 '최근 달린 댓글' 서비스를 제공합니다.
==============================+===============================================================
-->


<?php

session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 이용할 수 없으니, SignIn 페이지로 이동
if(!isset($UserID)){
  echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
  echo ("<script>location.href='../SignIn.php';</script>");
  exit();
}

$URLID = $_POST['URLID'];

require_once('Comment.php');
require_once('../MySQLConection.php');

$connect_userdb = MySQLConnection::DB_Connect('userdb') or die("Error Occured in Connection to DB");

$fetchURL = "
  SELECT URL FROM usersurltbl WHERE URLID = '$URLID'
";

$urlSelect = mysqli_query($connect_userdb, $fetchURL);
$url = mysqli_fetch_array($urlSelect);

class RecentCommentService{

  public static function ShowComments($postTitle, $dateTime, $comment, $commentUserID, $profileImageFileName, $pageID){

    global $url;

    $postURL = $url[0] . $pageID;

    $comment = html_entity_decode($comment);

    // comment가 너무 길면 앞 내용만 잘라 나타냄
    if(mb_strlen($comment) > 40){
      $comment = mb_substr($comment, 0, 45, 'utf-8') . '...';
    }

    if(empty($profileImageFileName)){
      $profileImageFileName = "img/userDefaultProfile.svg";
    }
    else {
      $profileImageFileName = "profileImages/" . $profileImageFileName;
    }

    return sprintf('
      <a target="_blank" href="%s" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">%s</h5>
            <small style="width: 120px; text-align: right;">%s</small>
          </div>
          <p class="mb-1">%s</p>
          <img class="rounded-circle commentProfile" src="%s">
          <small>%s</small>
      </a>
    ',
    $postURL,
    $postTitle,
    $dateTime,
    $comment,
    $profileImageFileName,
    $commentUserID
    );
  }
}

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// show tables로 모든 테이블 이름을 가져온다.
$showTables = '
  SHOW TABLES
';

$fetchOneTable = '';

$allTableName = mysqli_query($connect_object, $showTables);

// 날짜와 시간을 가중치로 하는 우선순위 큐
$pq = new SplPriorityQueue();

while($tableName = mysqli_fetch_array($allTableName)){

  if($tableName[0] == 'pagetitlepairs' || $tableName[0] == 'visitorcounter') continue;

  $fetchOneTable = '
    SELECT * FROM `' . $tableName[0] . '`
  ';

  $tblData = mysqli_query($connect_object, $fetchOneTable);

  while($comment = mysqli_fetch_array($tblData)){

    // 특수문자를 전부 제거해 가중치로 사용함
    $weight = (int)(preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $comment['DateTime']));

    $fetchTitleAndPageID = "
      SELECT * FROM pagetitlepairs WHERE PageID = '$tableName[0]'
    ";

    $TitleAndPageIDRet = mysqli_query($connect_object, $fetchTitleAndPageID);

    $TitleAndPageID = mysqli_fetch_array($TitleAndPageIDRet);

    // comment의 생성을 돕는 빌더 객체를 생성해 우선순위 큐에 넣는다.
    $pq->insert((new CommentBuilder())
    ->setPostTitle($TitleAndPageID['Title'])
    ->setDateTime($comment['DateTime'])
    ->setContent($comment['Content'])
    ->setCommentUserID($comment['CommentUserId'])
    ->setProfileImageFileName($comment['ProfileImageFileName'])
    ->setPageID($TitleAndPageID['PageID'])
    ->build(), $weight);

  }
}

$commentsElements = '';

if($pq->count() < 1){
  echo Comment::WarnNoComments();
  exit();
}

$index = 0;
while($pq->valid()){

  // 최근의 댓글을 10개 까지 가져옴
  if($index++ >= 10) break;

  $iterator = $pq->current();

  $commentsElements .= RecentCommentService::ShowComments(
    $iterator->PostTitle,
    $iterator->DateTime,
    $iterator->Content,
    $iterator->CommentUserId,
    $iterator->ProfileImageFileName,
    $iterator->PageID
  );

  $pq->next();
}

echo sprintf('
  <div class="list-group">
    <a class="list-group-item active" style="background-color: #474747!important; color: #ffffff; border: none !important;">최근 생성된 댓글</a>
    <div class="list-group-item">
      <div class="list-group">
        <div class="list-group">
         %s
        </div>
      </div>
    </div>
  </div>
  ', $commentsElements);
