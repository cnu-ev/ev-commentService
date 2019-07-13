<?php

session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 익명으로 한다.
// (, )는 특수문자로 일반 ID엔 사용할 수 없으므로 다른 ID들과 구분 가능
if(!isset($UserID)) $UserID = "(Anonymous)";

require_once('MySQLConection.php');

$CommentContent = $_POST['commentContent'];
$URLID = $_POST['urlID'];
$PageID = $_POST['pageID'];

// $CommentContent에 XSS 공격이 가해질 경우에 대한 대처로, strip_tags를 사용했다
// 댓글을 올릴 때와, echo할 때 모두 적용한다.
$CommentContent = strip_tags($CommentContent, '<b><i><s><u>');

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
