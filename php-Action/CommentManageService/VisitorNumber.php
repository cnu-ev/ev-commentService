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

// show tables로 모든 테이블 이름을 가져온다.
$fetchURL = "
  SELECT URL FROM usersurltbl WHERE URLID = '$URLID'
";

$urlSelect = mysqli_query($connect_userdb, $fetchURL);
$url = mysqli_fetch_array($urlSelect);

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");
