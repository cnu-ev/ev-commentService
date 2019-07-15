<?php
// https://thereclub.tistory.com/56 참고

// 세션이 유지되는 시간 설정 (60 * 6 = 6시간)
// 6시간 후 다시 방문하면 재방문으로 인정함
session_cache_expire(360);
session_start();

require_once('MySQLConection.php');

date_default_timezone_set('Asia/Seoul');

// 데이터가 전송된 시간 (방문 시간)
$visitDateTime = date("Y-m-d H:i:s");
// 방문한 클라이언트의 IP 주소
$visitorIP = $_SERVER['REMOTE_ADDR'];
// 어떤 홈페이지에서 방문한 것인지 정보가 있다면 가져온다.
if(isset($_SERVER['HTTP_REFERER'])) $prevPage = $_SERVER['HTTP_REFERER'];
else $prevPage = "";

$PageIdentifier = $_POST["PageIdentifier"];
$SiteURL = $_POST["SiteURL"];

// DB 연결
$connect_object = MySQLConnection::DB_Connect(Hashing("sha256", $SiteURL)) or die("Error Occured in Connection to DB");

// 이 게시글에 처음 방문했는지 검사한 후, 처음 방문이 아니라면 insert 하지 않음
$var = $_SESSION['visit'];

if(empty($_SESSION['visit'])) {

  $_SESSION['visit'] = 1;

  echo $_SESSION['visit'];

  $insertVisitorInfo = "
    insert into visitorcounter (
      REGDATE,
      REGIP,
      REFERER,
      PageID
      ) values(
      '$visitDateTime',
      '$visitorIP',
      '$prevPage',
      '$PageIdentifier'
    )";

  $ret = mysqli_query($connect_object, $insertVisitorInfo) or die("Error Occured in Inserting Data to DB");
}

function Hashing($Algorithm, $URL){
  return hash($Algorithm, $URL);
}
