 <!--
==============================+===============================================================
 @ Author : jopemachine
 @ Team : team ⓒ EV for BottomUp
 @ Created : 2019-07-03, 15:45:48
 ==============================+===============================================================
-->

<?php

  session_start();

  // 세션에 ID가 있다면, 로그인 된 상태이므로 바로 URL-Register로 이동
  if(isset($_SESSION['user_id'])){
    echo "<script>location.href='../URL-Register.php';</script>";
  }

  require_once('MySQLConection.php');

  $connect_object = MySQLConnection::DB_Connect('userdb');

  // Post 방식으로 유저 데이터를 가져옴
  $ID             = $_POST["ID"];
  $PW             = $_POST["PW"];

  // DB에서 PK (ID) 를 찾음
  $searchUserID = "
    SELECT * FROM usersinfotbl WHERE ID = '$ID'
  ";

  $ret = mysqli_query($connect_object, $searchUserID);

  $row = mysqli_fetch_array($ret);

  if(empty($row)){
    echo ("<script language=javascript>alert('존재하지 않는 계정입니다.')</script>");
    echo ("<script>location.href='../SignIn.php';</script>");
    exit();
  }

  else if($row['PW'] != $PW){
    echo ("<script language=javascript>alert('입력하신 ID의 비밀번호가 일치하지 않습니다.')</script>");
    echo ("<script>location.href='../SignIn.php';</script>");
    exit();
  }

  $_SESSION['user_id'] = $ID;
  $_SESSION['profileImageFileName'] = $row['ProfileImageFileName'];

  echo ("<script>location.href='../URL-Register.php';</script>");
