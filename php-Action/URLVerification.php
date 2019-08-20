<!--
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-03, 22:08:54
@ Desc :
@     클라이언트 페이지에서 댓글 페이지를 요청할 때 실행됩니다.
-->


<?php
// 전송받은 데이터를 비동기적으로 검증한다.
// DB엔 ajax로 php에 요청해 접근한다
// 검증에 실패하면 Fail 했다는 표시를 만들어 띄우자

require_once('MySQLConection.php');

$connect_object = MySQLConnection::DB_Connect('userdb') or die("Error Occured in Connection to DB");

$UserName               = $_GET["UserName"];
$PageIdentifier         = $_GET["PageIdentifier"];
$SiteURL                = $_GET["SiteURL"];
$URL_ID                 = Hashing("sha256", $SiteURL);
$EmotionalAnalysisMode  = $_GET["EmotionalAnalysisMode"];
$PageTitle              = $_GET["PageTitle"];

// DB에서 등록된 Site 인지 찾음
$searchSite = "
  SELECT * FROM usersurltbl WHERE URL = '$SiteURL'
";

$ret = mysqli_query($connect_object, $searchSite);

if(mysqli_num_rows($ret) < 1){
  $unregisteredServiceWarning = sprintf('
    <div class="alert alert-success">
      <p style="text-align: center; font-size: 14px; color: #4c4c4c; margin: 0px auto;">서비스에 등록된 블로그가 아닙니다.<br> evcommentservice.ga에 방문해 블로그를 등록해보세요</p>
    </div>
  ');
  echo $unregisteredServiceWarning;
  exit ();
}

// 설정되지 않은 값을 찾음
if(empty($UserName) || empty($PageIdentifier) || empty($SiteURL) || empty($PageTitle)){
  $settingError = sprintf('
    <div class="alert alert-success">
      <p style="text-align: center; font-size: 14px; color: #4c4c4c; margin: 0px auto;">모든 값이 설정되어 있지 않습니다.<br> evcommentservice.ga에서 서비스의 사용법을 확인하세요.</p>
    </div>
  ');
  echo $settingError;
  exit ();
}

// 등록된 요청이라면 해당 URL의 DB가 존재.
// PageID의 테이블이 존재하는지 확인
// 존재한다면 해당 테이블의 댓글 데이터를 반환
if(MySQLConnection::isExist($URL_ID, $PageIdentifier)){

  // 페이지 제목이 변경되면 (DB의 title과 다르면) DB에서도 변경
  $connect_url = MySQLConnection::DB_Connect($URL_ID) or die("Error Occured in Connection to DB");

  $confirmTitle = "
    SELECT * FROM pagetitlepairs WHERE PageID = '$PageIdentifier'
  ";

  $ret = mysqli_query($connect_url, $confirmTitle);

  $row = mysqli_fetch_array($ret);

  if($row['Title'] != $PageTitle){
    $updateTitle = "
      UPDATE pagetitlepairs SET
        Title = '$PageTitle'
        WHERE PageID = '$PageIdentifier'
    ";

    mysqli_query($connect_url, $updateTitle);
  }

  echo "<iframe id='EV-Iframe' style='width:100%; min-height: 400px; border:none;' scrolling='no' src='https://evcommentservice.ga/Comment.php?db=$URL_ID&pageID=$PageIdentifier&mode=$EmotionalAnalysisMode&paginationID=1'></iframe>";
}
// 존재하지 않는다면 새 테이블을 생성한 후 컴포넌트만 반환
else {

  $connect_url = MySQLConnection::DB_Connect($URL_ID) or die("Error Occured in Connection to DB");

  $createNewTable = "
    CREATE TABLE `$URL_ID`.`$PageIdentifier`(
    	`CommentUserId` VARCHAR(20) NOT NULL,
      `Content` MEDIUMTEXT NOT NULL,
      `DateTime` DATETIME NOT NULL,
      `ProfileImageFileName` VARCHAR(25),
      `CommentIndex` INT(11) NOT NULL AUTO_INCREMENT,
      `EmotionalAnalysisValue` FLOAT,
      PRIMARY KEY(`CommentIndex`)
  )
  ";

  // 해당 DB의 페이지 ID 테이블에 새 레코드 입력
  $insertComment = "
    Insert INTO pagetitlepairs(
      PageID,
      Title
      ) VALUES(
      '$PageIdentifier',
      '$PageTitle'
  )";

  mysqli_query($connect_url, $createNewTable);
  mysqli_query($connect_url, $insertComment);

  echo "<iframe id='EV-Iframe' style='width:100%; min-height: 400px; border:none;' scrolling='no' src='https://evcommentservice.ga/Comment.php?db=$URL_ID&pageID=$PageIdentifier&mode=$EmotionalAnalysisMode&paginationID=1'></iframe>";
}


function Hashing($Algorithm, $URL){
  return hash($Algorithm, $URL);
}
