<!-- evcommentservice.ga 에서가 아니라, 댓글 iframe 내에서 로그인 하려고 할 때 사용하는 코드 -->
<?php

require_once('MySQLConection.php');

// Post 방식으로 유저 데이터를 가져옴
$ID = $_POST["ID"];
$PW = $_POST["PW"];

$connect_object = MySQLConnection::DB_Connect('userdb');

// DB에서 PK (ID) 를 찾음
$searchUserID = "
  SELECT * FROM usersinfotbl WHERE ID = '$ID'
";

$ret = mysqli_query($connect_object, $searchUserID);

$row = mysqli_fetch_array($ret);

if(empty($row)){
  echo ("<script language=javascript>alert('존재하지 않는 계정입니다.')</script>");
  echo ("<script>location.reload();</script>");
  exit();
}

else if($row['PW'] != $PW){
  echo ("<script language=javascript>alert('입력하신 ID의 비밀번호가 일치하지 않습니다.')</script>");
  echo ("<script>location.reload();</script>");
  exit();
}

// 1시간 동안 로그인 및 유저 프로필 사진 이름을 쿠키를 이용해 유지함
setcookie("connectedUserID", $ID, time() + 3600, "/");
setcookie("profileImageFileName", $row['ProfileImageFileName'], time() + 3600, "/");
