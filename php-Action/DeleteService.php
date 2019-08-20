<!--
@ File Name : DeleteService.php
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-12, 17:40:05
@ Desc : 
@    evCommentService.ga에서 서비스를 삭제하는 버튼을 눌렀을 때 실행됩니다.
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

require_once('MySQLConection.php');

// DB 연결
$connect_object = MySQLConnection::DB_Connect('userdb') or die("Error Occured in Connection to DB");

$URL_ID = $_POST["URLID"];

// DB에 UserID와 URLID가 같은 레코드를 뽑아 제거
// ID까지 검사하는 이유는, 인증받지 않은 유저가 남의 서비스를 제거하는 것을 막기 위한 것임
$deleteService = "
  DELETE FROM usersurltbl WHERE URLID ='$URL_ID' AND UserID ='$UserID'
";

mysqli_query($connect_object, $deleteService) or die("Error Occured in Deleting data in DB");

$deleteDB = "
  DROP DATABASE $URL_ID
";

mysqli_query($connect_object, $deleteDB) or die("Error Occured in Deleting DB");
