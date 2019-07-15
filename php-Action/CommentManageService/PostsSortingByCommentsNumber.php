<?php

session_start();

$UserID = $_SESSION['user_id'];

// 세션에 ID가 없다면, 이용할 수 없으니, SignIn 페이지로 이동
if(!isset($UserID)){
  echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
  echo ("<script>location.href='../SignIn.php';</script>");
  exit();
}

$URLID = $_POST['URLID'];

require_once('../MySQLConection.php');

class PostsSortingByCommentsNumber{

  public static function WarnNoComments(){

    return sprintf('
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
        <p id="NoCommentsWarning" class="lead" style="font-size: 14px; color: #4c4c4c;">블로그에 등록된 댓글이 없습니다.</p>
      </div>
    ');
  }

  public static function ShowComments($postTitle, $dateTime, $comment, $commentUserID, $profileImageFileName){

  }
}

$connect_object = MySQLConnection::DB_Connect($URLID) or die("Error Occured in Connection to DB");

// show tables로 모든 테이블 이름을 가져온다.
$showTables = '
  SHOW TABLES
';

$unionAllTable = '';

$allTableName = mysqli_query($connect_object, $showTables);

// 갯수를 가중치로 하는 우선순위 큐
$pq = new SplPriorityQueue();

// 모든 테이블을 Union 하는 쿼리문을 생성
while($tableName = mysqli_fetch_array($allTableName)){
  $countRows = '
    SELECT TABLE_ROWS FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$tableName[0]';
  ';

  $ret = mysqli_query($connect_object, $countRows);
  $number = mysqli_fetch_array($ret);

  $pq->insert(, $number[0]);
}
