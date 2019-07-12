<?php

session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 이용할 수 없으니, SignIn 페이지로 이동
if(!isset($UserID))
  echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
  echo ("<script>location.href='../SignIn.php';</script>");
  exit();
}

require_once('MySQLConection.php');

// DB 연결
$connect_object = MySQLConnection::DB_Connect('userdb');

$URL_ID = $_POST["URLID"];

// DB에 UserID와 URLID가 같은 레코드가 존재하는지 검사
$deleteService = "
  DELETE FROM usersurltbl WHERE URLID ='$URL_ID' AND UserID ='$UserID'
";

$ret = mysqli_query($connect_object, $deleteService);
