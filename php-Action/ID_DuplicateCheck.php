 <!--
==============================+===============================================================
 @ Author : jopemachine
 @ Team : team ⓒ EV for BottomUp
 @ Created : 2019-07-03, 15:47:33
 ==============================+===============================================================
-->

<?php
require_once('MySQLConection.php');

$UserNewID      = $_GET["userID"];

// DB 연결
$connect_object = MySQLConnection::DB_Connect('userdb');

// DB에서 PK (ID) 중복 검사
$searchUserID = "
  SELECT * FROM usersinfotbl WHERE ID = '$UserNewID'
";

$ret = mysqli_query($connect_object, $searchUserID);

// 중복 ID가 존재하는 경우 알려줌
if(mysqli_num_rows($ret) > 0){
  echo '중복된 ID가 존재합니다.';
  exit();
}

echo '사용할 수 있는 ID 입니다!';
