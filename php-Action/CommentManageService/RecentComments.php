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

require_once('../MySQLConection.php');

class RecentComments{

  public static function WarnNoComments(){

    return sprintf('
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
        <p id="NoCommentsWarning" class="lead" style="font-size: 14px; color: #4c4c4c;">블로그에 등록된 댓글이 없습니다.</p>
      </div>
    ');
  }

  public static function ShowComments($postTitle, $dateTime, $comment, $commentUserID){
    // comment가 너무 길면 앞 내용만 잘라 나타냄
    if(mb_strlen($comment) > 40){
      $comment = mb_substr($comment, 0, 45, 'utf-8') . '...';
    }

    return sprintf('
      <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">%s</h5>
          <small style="width: 120px; text-align: right;">%s</small>
        </div>
        <p class="mb-1">%s</p>
        <small>%s</small>
      </a>
    ',
    $postTitle,
    $dateTime,
    $comment,
    $commentUserID
    );
  }
}

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// show tables로 모든 테이블 이름을 가져온다.
$showTables = '
  SHOW TABLES
';

$unionAllTable = '';

$allTableName = mysqli_query($connect_object, $showTables);

// 모든 테이블을 Union 하는 쿼리문을 생성
while($tableName = mysqli_fetch_array($allTableName)){
  $unionAllTable .= '
    SELECT CommentUserId, Content, DateTime, PostTitle FROM `' . $tableName[0] .'`
    UNION ALL
';
}

// 마지막 'UNION ALL'을 제거
if(mysqli_num_rows($allTableName) > 0){
  $arr = explode(' ', $unionAllTable);
  // 마지막 문자열의 UNION 제거
  unset($arr[count($arr) - 1]);
  // 마지막 문자열의 All 제거
  unset($arr[count($arr) - 1]);
  $unionAllTable = implode(' ', $arr);
}

// 쿼리문에 DateTime 내림차순으로 정렬하는 문장 추가
$unionAllTable .= '
  ORDER BY DATETIME DESC
';

$allComments = mysqli_query($connect_object, $unionAllTable);

// 최근의 댓글을 10개 까지 가져옴
$index = 0;
$commentsElements = '';

if(mysqli_num_rows($allComments) < 1){
  echo RecentComments::WarnNoComments();
  exit();
}

while($comment = mysqli_fetch_array($allComments)){
  if($index++ > 10){
    break;
  }
  $commentsElements .= RecentComments::ShowComments($comment['PostTitle'], $comment['DateTime'], $comment['Content'], $comment['CommentUserId']);
}

echo sprintf('
  <div class="list-group">
    <a href="#" class="list-group-item active">최근 생성된 댓글</a>
    <div class="list-group-item">
      <div class="list-group">
        <div class="list-group">
         %s
        </div>
      </div>
    </div>
  </div>
  ', $commentsElements);
