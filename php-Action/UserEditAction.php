 <!--
==============================+===============================================================
 @ Author : jopemachine
 @ Team : team ⓒ EV for BottomUp
 @ Created : 2019-07-14, 15:45:47
 ==============================+===============================================================
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
$connect_object = MySQLConnection::DB_Connect('userdb');

// Post 방식으로 유저 데이터를 가져옴
$PW           = $_POST["PW"];
$PW_Confirm   = $_POST["PW_Confirm"];
$Address      = $_POST["Address"];
$PhoneNumber  = $_POST["PhoneNumber"];
$Gender       = $_POST["Gender"];
$Name         = $_POST["FirstName"] . ' '. $_POST["LastName"];
$Email        = $_POST["Email"];

$reg_Email = preg_match('/^[\w]([-_.]?[\w])*@[\w]([-_.]?[\w])*.[a-zA-Z]{2,3}$/i', $Email, $r2);

// 매칭되지 않는 값이 들어올 경우 UserEdit을 실행하지 않는다
if(!empty($Email)){
  if($reg_Email == 0){
    echo ("<script language=javascript>alert('잘못된 형식의 이메일 입력입니다.')</script>");
    echo ("<script>location.href='../UserEdit.php';</script>");
    exit();
  }
}

if($_FILES['ProfileImage']['size'] != 0) {

  // 기존의 프로필 사진 삭제
  if(!empty($_POST['OldProfileImageFileName'])){
    var_dump("..\\" . $_POST['OldProfileImageFileName']);
    unlink("..\\" . $_POST['OldProfileImageFileName']);
  }

  // 중복 ID가 없는 경우, 프로필 사진 업로드 처리 및 폴더에 저장
  $ProfileImageUploadDir = $_SERVER['DOCUMENT_ROOT'] . '\profileImages\\';

  // 아래 코드에서 mb_stristr가 파일 확장자만 잘라 ID와 붙인다
  $ProfileImageFileName = $UserID . mb_stristr($_FILES['ProfileImage']['name'], '.');
  $ProfileImageFilePath = $ProfileImageUploadDir . $ProfileImageFileName;

  // 임시 디렉터리의 tmp 파일을 위 위치로 옮김
  if(!move_uploaded_file($_FILES['ProfileImage']['tmp_name'], $ProfileImageFilePath)){
    print "프로필 이미지 파일 전송 실패!\n";
  }

  // ID와 같은 레코드를 업데이트 한다.
  $updateUserRecord = "
    UPDATE usersinfotbl SET
      PW = '$PW',
      Address = '$Address',
      PhoneNumber = '$PhoneNumber',
      ProfileImageFileName = '$ProfileImageFileName',
      Gender = '$Gender',
      Email = '$Email',
      Name = '$Name'
      WHERE ID = '$UserID'
  ";
}
else{

  // ID와 같은 레코드를 업데이트 한다. (프로필 사진은 업데이트 하지 않음)
  $updateUserRecord = "
    UPDATE usersinfotbl SET
      PW = '$PW',
      Address = '$Address',
      PhoneNumber = '$PhoneNumber',
      Gender = '$Gender',
      Email = '$Email',
      Name = '$Name'
      WHERE ID = '$UserID'
  ";
}

$ret = mysqli_query($connect_object, $updateUserRecord) or die("Error Occured in Updating Data in DB");

echo ("<script language=javascript>alert('정보 수정이 완료되었습니다!')</script>");
echo ("<script>location.href='../URL-Register.php';</script>");
