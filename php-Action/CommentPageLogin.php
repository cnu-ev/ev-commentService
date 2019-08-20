<!--
@ File Name : CommentPageLogin.php
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-05, 17:53:33
@ Desc : 
@    Comment.php에서 로그인할 때 ajax로 호출합니다. evCommentService.ga에서 로그인 할 땐 SignInAction.php를 사용합니다.
-->


<!-- evcommentservice.ga 에서가 아니라, 댓글 iframe 내에서 로그인 하려고 할 때 사용하는 코드 -->
<?php

session_start();

require_once('MySQLConection.php');

// Post 방식으로 유저 데이터를 가져옴
$ID             = $_POST["ID"];
$PW             = $_POST["PW"];

$connect_object = MySQLConnection::DB_Connect('userdb');

// DB에서 PK (ID) 를 찾음
$searchUserID = "
  SELECT * FROM usersinfotbl WHERE ID = '$ID'
";

$ret = mysqli_query($connect_object, $searchUserID);

$row = mysqli_fetch_array($ret);

// 존재하지 않는 계정이라면 이전 페이지로 이동
$prevPage = $_SERVER["HTTP_REFERER"];

if(empty($row)){
  echo ("<script language=javascript>alert('존재하지 않는 계정입니다.')</script>");
  header("location:" . $prevPage);
  exit();
}

else if($row['PW'] != $PW){
  echo ("<script language=javascript>alert('입력하신 ID의 비밀번호가 일치하지 않습니다.')</script>");
  header("location:" . $prevPage);
  exit();
}

$_SESSION['user_id'] = $ID;
$_SESSION['profileImageFileName'] = $row['ProfileImageFileName'];

header("location:".$prevPage);
