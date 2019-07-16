<?php

session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 이용할 수 없음
if(!isset($UserID)){
  echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
  echo ("<script>location.href='SignIn.php';</script>");
  exit();
}

require_once('MySQLConection.php');

// DB에 접속
$connect_object = MySQLConnection::DB_Connect('userdb') or die("Error Occured in Connection to DB");

// Post 방식으로 유저 데이터를 가져옴
$URL_Title = $_POST["URL-Title"];
$URL = $_POST["URL"];
$URL_ID = Hashing("sha256", $URL);

// 중복 레코드가 있는지 검사. 존재한다면 이전 페이지로 돌아감
$searchURLID = "
  SELECT * FROM usersurltbl WHERE URLID = '$URL_ID'
";

$ret = mysqli_query($connect_object, $searchURLID);

$row = mysqli_fetch_array($ret);

if(!empty($row)){
  echo ("<script language=javascript>alert('이미 존재하는 URL입니다. 서비스 관리자에게 문의하세요.')</script>");
  echo ("<script>location.href='../URL-Register.php';</script>");
  exit();
}

// DB에 새 레코드 입력
$insertData = "
  Insert INTO usersurltbl (
    URLID,
    URLTitle,
    URL,
    UserID
    ) VALUES(
    '$URL_ID',
    '$URL_Title',
    '$URL',
    '$UserID'
)";

$createNewService = "
  CREATE DATABASE `$URL_ID` CHARSET 'utf8mb4' COLLATE utf8mb4_unicode_ci
";

// 특정 서비스의 특정 PageID 테이블이 갖는 게시글 Title 정보를 갖고 있다.
// 즉, 어떤 게시글의 제목 정보를 담고 있는 테이블이다.
$createPageTitlePairTable = "
  CREATE TABLE pagetitlepairs(
    `PageID` MEDIUMTEXT NOT NULL,
    `Title` MEDIUMTEXT NOT NULL
  )
";

// 세션을 통해 특정 게시글의 방문 수를 관리하는 테이블
$createVisitorTable = "
  CREATE TABLE visitorcounter (
    `I` INT(11) NOT NULL AUTO_INCREMENT,
    `PageID` MEDIUMTEXT NOT NULL,
    `REGDATE` DATETIME NOT NULL,
    `REGIP` VARCHAR(30) NULL,
    `REFERER` TEXT NULL,
    PRIMARY KEY(`I`)
);"

$ret = mysqli_query($connect_object, $insertData) or die("Error Occured in Inserting Data to DB");
$ret = mysqli_query($connect_object, $createNewService) or die("Error Occured in Creating DB");

$connect_url = MySQLConnection::DB_Connect($URL_ID) or die("Error Occured in Connection to DB");

$ret = mysqli_query($connect_url, $createPageTitlePairTable) or die("Error Occured in Creating Table");
$ret = mysqli_query($connect_url, $createVisitorTable) or die("Error Occured in Creating Table");

function Hashing($Algorithm, $URL){
  return hash($Algorithm, $URL);
}

echo ("<script>location.href='../URL-Register.php';</script>");
