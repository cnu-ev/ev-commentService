<?php

require_once('MySQLConection.php');

// 쿠키를 가져와 로그인 한 유저가 맞는지 확인
$UserID = $_COOKIE["connectedUserID"];

// DB에 접속
$connect_object = MySQLConnection::DB_Connect('userdb') or die("Error Occured in Connection to DB");
$connect_object_urlDB = MySQLConnection::DB_Connect('urlcommentdb') or die("Error Occured in Connection to DB2");

// Post 방식으로 유저 데이터를 가져옴
$URL_Title = $_POST["URL-Title"];
$URL = $_POST["URL"];
$URL_ID = Hashing("sha256", $URL);

var_dump($UserID);
var_dump($URL);
var_dump($URL_ID);
var_dump($URL_Title);

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

// URL에 매칭되는 새 댓글 데이터를 담는 테이블을 ev-url-comment-db에 생성
$createNewService = "
  CREATE TABLE `urlcommentdb`.`$URL_ID`(
  	`CommentUserId` VARCHAR(20) NOT NULL,
    `Content` MEDIUMTEXT NOT NULL,
    `DateTime` DATETIME NOT NULL,
    `ProfileImageFileName` VARCHAR(25),
    `CommentIndex` INT(11) NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(`CommentIndex`)
)";

$ret = mysqli_query($connect_object, $insertData) or die("Error Occured in Inserting Data to DB");
$ret = mysqli_query($connect_object_urlDB, $createNewService) or die("Error Occured in Making table");

function Hashing($Algorithm, $URL){
  return hash($Algorithm, $URL);
}

echo ("<script>location.href='../URL-Register.php';</script>");
