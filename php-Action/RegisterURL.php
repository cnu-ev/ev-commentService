<?php

require_once('MySQLConection.php');

// 쿠키를 가져와 로그인 한 유저가 맞는지 확인
$UserID = $_COOKIE["connectedUserID"];

// DB에 접속
$connect_object = MySQLConnection::DB_Connect('userdb') or die("Error Occured in Connection to DB");

// Post 방식으로 유저 데이터를 가져옴
$URL_Title = $_POST["URL-Title"];
$URL = $_POST["URL"];
$URL_ID = Hashing("sha256", $URL);

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
  CREATE DATABASE `$URL_ID`
";

$createDefaultTable = "
  CREATE TABLE `$URL_ID`.`default`(
  	`CommentUserId` VARCHAR(20) NOT NULL,
    `Content` MEDIUMTEXT NOT NULL,
    `DateTime` DATETIME NOT NULL,
    `ProfileImageFileName` VARCHAR(25),
    `CommentIndex` INT(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(`CommentIndex`)
)";

$ret = mysqli_query($connect_object, $insertData) or die("Error Occured in Inserting Data to DB");
$ret = mysqli_query($connect_object, $createNewService) or die("Error Occured in Creating DB");

$connect_url = MySQLConnection::DB_Connect($URL_ID) or die("Error Occured in Connection to DB");
$ret = mysqli_query($connect_url, $createDefaultTable) or die("Error Occured in Creating DB");

function Hashing($Algorithm, $URL){
  return hash($Algorithm, $URL);
}

echo ("<script>location.href='../URL-Register.php';</script>");
