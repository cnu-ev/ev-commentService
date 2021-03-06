<!--
==============================+===============================================================
@ File Name : DeleteComment.php
@ Author : jopemachine
@ Team : team ⓒ EV for 2019 BottomUp
@ Created Date : 2019-07-04, 19:46:32
@ Desc : 
@    댓글을 삭제하는 버튼을 클릭했을 때, 실행됩니다. 인자로 넘어온 UserID 값이 지우려 하는 댓글의 ID와 같다면 DB에서 댓글을 지웁니다.
==============================+===============================================================
-->


<?php

require_once('MySQLConection.php');

// CommentID는 Auto Index로, 삭제하고 다시 insert해도 중복된 값이 들어가지
// 않으므로 ID 값으로 쓸 수 있음.
$UserID         = $_POST['userID'];
$CommentID      = $_POST['CommentID'];
$URLID          = $_POST['urlID'];
$PageID         = $_POST['pageID'];

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// CommentID와 같은 레코드를 선택한다.
$selectComment = "
  SELECT * FROM `" . $PageID . "` WHERE CommentIndex = '$CommentID'
";

$ret = mysqli_query($connect_object, $selectComment);

$row = mysqli_fetch_array($ret);

// User ID가 Comment User ID와 다를 경우 댓글을 삭제할 수 없게 한다.
// 이미 지워진 댓글을 시도하려고 하는 경우 역시 아무 행동도 취하지 않는다.

if(empty($row) || $row['CommentUserId'] != $UserID){
  exit();
}

// CommentID와 같은 레코드를 삭제한다.
$deleteComment = "
  DELETE FROM `" . $PageID . "` WHERE CommentIndex = '$CommentID'
";

mysqli_query($connect_object, $deleteComment) or die("Error Occured in deleteing Data");
