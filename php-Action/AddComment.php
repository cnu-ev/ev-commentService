<?php

require_once('MySQLConection.php');

$UserID = $_POST['userID'];
$CommentContent = $_POST['commentContent'];
$URLID = $_POST['urlID'];
$PageID = $_POST['pageID'];

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
    ProfileImageFileName
    ) VALUES(
    '$UserID',
    '$CommentContent',
    Now(),
    '$ProfileImageFileName'
)";

$ret = mysqli_query($connect_object, $insertComment) or die("Error Occured in Inserting data to DB");
