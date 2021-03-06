<!--
==============================+===============================================================
@ File Name : AddComment.php
@ Author : jopemachine
@ Team : team ⓒ EV for 2019 BottomUp
@ Created Date : 2019-07-04, 19:46:23
@ Desc : 
@    댓글을 제출할 때 Ajax로 호출되어, 감정분석 값을 포함한 댓글 데이터를 DB에 저장합니다.
==============================+===============================================================
-->


<?php

session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 익명으로 한다.
// (, )는 특수문자로 일반 ID엔 사용할 수 없으므로 다른 ID들과 구분 가능
if(!isset($UserID)) $UserID = "(Anonymous)";

require_once('MySQLConection.php');

$CommentContent = $_POST['commentContent'];
$URLID          = $_POST['urlID'];
$PageID         = $_POST['pageID'];
$PostTitle      = $_POST['postTitle'];

// $CommentContent에 XSS 공격이 가해질 경우에 대한 대처로, strip_tags를 사용했다
// 댓글을 올릴 때와, echo할 때 모두 적용한다.
$PermitTags     = '<b><i><s><u><a><strong>';
$CommentContent = strip_tags(html_entity_decode($CommentContent), $PermitTags);

if(empty($_POST['emotionalAnalysisValue'])){
  $EmotionalAnalysisValue = 0;
}
else {
  $EmotionalAnalysisValue = $_POST['emotionalAnalysisValue'];
}

if(empty($_POST['profileImageFileName'])){
  $ProfileImageFileName = '';
}
else {
  $ProfileImageFileName = $_POST['profileImageFileName'];
}

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// 해당 DB의 페이지 ID 테이블에 새 레코드 입력
$insertComment = "
  Insert INTO `" . $PageID . "`(
    CommentUserId,
    Content,
    DateTime,
    ProfileImageFileName,
    EmotionalAnalysisValue
    ) VALUES(
    '$UserID',
    '$CommentContent',
    Now(),
    '$ProfileImageFileName',
    '$EmotionalAnalysisValue'
)";

$ret = mysqli_query($connect_object, $insertComment) or die("Error Occured in Inserting data to DB");
