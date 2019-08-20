<!--
@ File Name : SignUpAction.php
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-03, 15:45:47
@ Desc : 
@    evCommentService.ga에 회원가입할 때 실행됩니다.
-->


<?php
require_once('MySQLConection.php');

// DB 연결
$connect_object = MySQLConnection::DB_Connect('userdb');

// Post 방식으로 유저 데이터를 가져옴
$ID           = $_POST["ID"];
$PW           = $_POST["PW"];
$PW_Confirm   = $_POST["PW_Confirm"];
$Address      = $_POST["Address"];
$PhoneNumber  = $_POST["PhoneNumber"];
$Gender       = $_POST["Gender"];
$Name         = $_POST["FirstName"] . ' '. $_POST["LastName"];
$Email        = $_POST["Email"];

$reg_ID       = preg_match('/^[a-zA-z]{1}[\w]{3,19}$/', $ID, $r1);
$reg_Email    = preg_match('/^[\w]([-_.]?[\w])*@[\w]([-_.]?[\w])*.[a-zA-Z]{2,3}$/i', $Email, $r2);

// 매칭되지 않는 값이 들어올 경우 UserEdit을 실행하지 않는다
if(!empty($Email)){
  if($reg_Email == 0){
    echo ("<script language=javascript>alert('잘못된 형식의 이메일 입력입니다.')</script>");
    echo ("<script>location.href='../SignUp.html';</script>");
    exit();
  }
}

// 매칭되지 않는 값이 들어올 경우 UserEdit을 실행하지 않는다
if($reg_ID == 0){
  echo ("<script language=javascript>alert('잘못된 형식의 ID 입력입니다.')</script>");
  echo ("<script>location.href='../SignUp.html';</script>");
  exit();
}

// DB에서 PK (ID) 중복 검사
$searchUserID = "
  SELECT * FROM usersinfotbl
";

$ret = mysqli_query($connect_object, $searchUserID);

// 중복 ID가 존재하는 경우 에러처리
while($row = mysqli_fetch_array($ret)){
  if($ID == $row['ID']){
    echo ("<script language=javascript>alert('중복된 ID가 있습니다.')</script>");
    echo ("<script>location.href='../SignUp.html';</script>");
    exit();
  }
}

if($_FILES['ProfileImage']['size'] != 0){
  // 중복 ID가 없는 경우, 프로필 사진 업로드 처리 및 폴더에 저장

  $ProfileImageUploadDir = $_SERVER['DOCUMENT_ROOT'] . '\profileImages\\';

  // 아래 코드에서 mb_stristr가 파일 확장자만 잘라 ID와 붙인다
  $ProfileImageFileName = $ID . mb_stristr($_FILES['ProfileImage']['name'], '.');
  $ProfileImageFilePath = $ProfileImageUploadDir . $ProfileImageFileName;

  // 임시 디렉터리의 tmp 파일을 위 위치로 옮김
  if(move_uploaded_file($_FILES['ProfileImage']['tmp_name'], $ProfileImageFilePath)){
    // 프로필 이미지 파일 전송 성공
  }
  else{
    print "프로필 이미지 파일 전송 실패!\n";
  }
}
else{
  $ProfileImageFileName = '';
}

// DB에 새 레코드 입력
$insertData = "
  Insert INTO usersinfotbl (
    ID,
    PW,
    Address,
    PhoneNumber,
    ProfileImageFileName,
    Gender,
    Name,
    SignupDate,
    Email
    ) VALUES(
    '$ID',
    '$PW',
    '$Address',
    '$PhoneNumber',
    '$ProfileImageFileName',
    '$Gender',
    '$Name',
    Now(),
    '$Email'
)";

mysqli_query($connect_object, $insertData) or die("Error Occured in Inserting Data to DB");

echo ("<script language=javascript>alert('회원가입이 완료되었습니다!')</script>");
echo ("<script>location.href='../SignIn.php';</script>");

mysqli_close($connect_object);
