<?php
require_once('MySQLConection.php');

// CommentID는 Auto Index로, 삭제하고 다시 insert해도 중복된 값이 들어가지
// 않으므로 ID 값으로 쓸 수 있음.
$UserID         = $_POST['userID'];
$CommentID      = $_POST['CommentID'];
$URLID          = $_POST['urlID'];
$PageID         = $_POST['pageID'];
$UpdatedContent = $_POST['updatedContent'];

if(empty($_POST['emotionalAnalysisValue'])){
  $EmotionalAnalysisValue = 0;
}
else {
  $EmotionalAnalysisValue = $_POST['emotionalAnalysisValue'];
}

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// CommentID와 같은 레코드를 선택한다.
$selectComment = "
  SELECT * FROM `" . $PageID . "` WHERE CommentIndex = '$CommentID'
";

$ret = mysqli_query($connect_object, $selectComment) or die("Error Occured in Selecting in DB");

$row = mysqli_fetch_array($ret);

// User ID가 Comment User ID와 다를 경우 댓글을 수정할 수 없게 한다
// 이미 지워진 댓글을 시도하려고 하는 경우 역시 아무 행동도 취하지 않는다.

if(empty($row) || $row['CommentUserId'] != $UserID){
  exit();
}

// CommentID와 같은 레코드를 업데이트 한다.
$updateComment = "
  UPDATE `" . $PageID . "` SET
    Content = '$UpdatedContent',
    EmotionalAnalysisValue = '$EmotionalAnalysisValue',
    DateTime = NOW()
    WHERE CommentIndex = '$CommentID'
";

$ret = mysqli_query($connect_object, $updateComment) or die("Error Occured in Updating DB");
