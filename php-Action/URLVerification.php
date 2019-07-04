<?php
// 전송받은 데이터를 비동기적으로 검증한다.
// DB엔 ajax로 php에 요청해 접근한다
// 검증에 실패하면 Fail 했다는 표시를 만들어 띄우자

// Post 방식으로 유저 데이터를 가져옴

$UserName = $_GET['UserName'];
$PageIdentifier = $_GET["PageIdentifier"];
$SiteURL = $_GET["SiteURL"];


echo "전송 성공";
