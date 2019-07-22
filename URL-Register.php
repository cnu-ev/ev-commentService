<?php
require_once('php-Action\UserModalBox.php');
require_once('php-Action\MySQLConection.php');
require_once('php-Action\ShowHomePage.php');

session_start();

$ID = $_SESSION['user_id'];

if(!isset($ID)){
  echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
  echo ("<script>location.href='SignIn.php';</script>");
  exit();
}

$connect_object = MySQLConnection::DB_Connect('userdb');

// 로그인 된 유저의 모든 등록된 URL을 가져와 표시한다
$searchUserURLs = "
  SELECT * FROM usersurltbl WHERE UserID = '$ID'
";

// ID 검색
$searchUserID = "
  SELECT * FROM usersinfotbl WHERE ID = '$ID'
";

$ret_userID = mysqli_query($connect_object, $searchUserID);
$row_userID = mysqli_fetch_array($ret_userID);

// 존재하는 아이디인지, 자바스크립트로 점검했더라도 서버 쪽에서 다시 점검한다.
if(mysqli_num_rows($ret_userID) < 1){
  echo ("<script language=javascript>alert('존재하지 않는 ID입니다!')</script>");
  echo ("<script>location.href='SignIn.php';</script>");
  exit ();
}

?>

<!DOCTYPE html>
<html lang="kr">
  <head>
    <title>등록된 서비스</title>
    <!-- meta 데이터 정의 -->
    <meta charset="utf-8">
    <meta name="description" content="Register Your Homepage">
    <meta name="keywords" content="Sentimental Analysis Comment Service">
    <meta name="author" content="Team EV">
    <!-- 반응형 웹페이지 구현을 위한 meta 데이터 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/RegisterURL.css">
    <!-- Favicon 적용 -->
    <link rel="shortcut icon" size="16x16" href="./img/favicon.ico" />
  </head>

  <body id="Background">
    <div class="container">
      <!-- 인라인으로 스타일을 준 것은, bootstrap.css에서 색상 속성이 !important로 선언되어 있기 때문임. boostrap 파일을 변경하기보단, 인라인으로 새 속성을 주었음 -->
      <nav id="FixedNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #333333 !important">
        <img src="img/smile.svg" style="margin-right: 10px;">
        <a class="navbar-brand" href="#">서비스 중인 홈페이지</a>

        <!-- 창 너비에 따라 버튼이 미디어 쿼리로, 두 종류로 나뉜다. -->
        <!-- 아래의 버튼은 창이 작을 때, 핸드폰이나 태블릿 같은 환경에서 사용할 버튼 및 a 태그 들이다.-->
        <button class="navbar-toggler responsiveNone2" data-toggle="collapse" data-target="#navCollapse">
          <!-- 아이콘 같은 걸 넣을 때 span 태그를 사용함 -->
          <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navCollapse" class="collapse navbar-collapse responsiveNone2">

          <!-- ml은 margin-left. -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#HomePageAddModal">새 홈페이지</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./php-Action/SignOutAction.php">로그아웃</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#UserInfoModal">내 정보</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./UserEdit.php">정보 수정</a>
            </li>
          </ul>
        </div>

        <!-- 아래의 버튼들은 데스크톱에서 사용할 버튼 -->

        <!-- 텍스트를 중간에 배치하기 위해 버튼들을 absoulte로 놓고 오른쪽엔 div로 따로 공간을 두었음 -->
        <!-- sizeUpOnHover가 들어간 엘리먼트는 hover 하면 크기가 커짐 -->
        <div class="btn-group float-right responsiveNone">
          <button type="button" class="side_btn sizeUpOnHover" data-toggle="modal" data-target="#HomePageAddModal"><img src="img/plus.svg" alt="Service Add Button"></button>
          <button type="button" class="btn-sm side_btn dropdown-toggle sizeUpOnHover" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/menu.svg" alt="sidebar menu"></button>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="./php-Action/SignOutAction.php">로그아웃</a>
            <a class="dropdown-item" data-toggle="modal" data-target="#UserInfoModal">내 정보</a>
            <a class="dropdown-item" href="./UserEdit.php">정보 수정</a>
          </div>
          <button type="button" class="side_btn sizeUpOnHover" data-toggle="modal" data-target="#UserInfoModal"><img src="img/user.svg" alt="user info button"></button>
        </div>

      </nav>
    </div>

    <section id="ServiceSection" class="container mt-1" style="padding-top: 75px;">

      <?php

        // 서버의 DB에서 해당 유저 ID로 등록된 URL을 전부 가져온다
        $ret_URLs = mysqli_query($connect_object, $searchUserURLs);

        if(mysqli_num_rows($ret_URLs) < 1)
        {
          echo ShowHomePage::WarnNoHomePagesToShow();
        }

        while($row = mysqli_fetch_array($ret_URLs)){
          echo ShowHomePage::ShowHomePages($row['URLTitle'], $row['URL'], $row['URLID']);
        }

      ?>

    </section>

    <!-- 더 좋은 방법을 찾으면 아래 공백을 없애고 싶다 -->
    <div id="WhiteSpaceForResponsivePage"></div>

    <!-- fade 클래스를 이용해 애니메이션을 줌 -->
    <!-- tabindex에 대해선 오른쪽 참고 https://developers.google.com/web/fundamentals/accessibility/focus/using-tabindex?hl=ko -->
    <div id="UserInfoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <!-- modal-sm, modal-md, modal-lg는 modal 창 크기에 대한 부트스트랩 속성임 -->
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <?php
            echo UserModalBox::GenerateUserInfoModal($row_userID['ID'], $row_userID['ProfileImageFileName']);
          ?>
        </div>
      </div>
    </div>


    <div id="HomePageAddModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">새 서비스 추가</h5>
            <!-- data-dismiss 속성을 통해, 취소 버튼을 누르면 모달 박스가 없어지는 것을 구현 -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <!-- times를 x 버튼 대신 이용함 -->
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <p style="margin-left :15px; margin-top: 8px; color: #333333;"><b style="color: red;">*</b> Jekyll 기반의 블로그 URL을 추가해주세요!</p>
          <div class="modal-body">
            <form action="./php-Action/RegisterURL.php" onsubmit="return AddURLButtonClicked()" method="post" accept-charset="utf-8">
              <div class="form-group">
                <label for="URL-Title">웹 사이트 제목</label>
                <input id="URL-Title" name="URL-Title" type="text" class="form-control">
              </div>
              <div class="form-group">
                <label for="URL">사이트 URL</label>
                <textarea id="URL" name="URL" type="text" class="form-control" style="height: 180px;"></textarea>
              </div>
              <div class="modal-footer">
                <!-- data-dismiss 속성을 통해, 취소 버튼을 누르면 모달 박스가 없어지는 것을 구현 -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                <button type="submit" class="btn btn-primary">추가하기</button>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 부트스트랩에서 Custom Modal Box의 기본적인 틀. prompt 대신 사용함 -->
    <!-- 채팅방에서 나갈 것인지 확인하기 위해 띄우는 모달 박스 -->
    <!-- btn-sm, btn-md, btn-lg는 버튼 크기에 대한 부트스트랩 속성임 -->
    <div id="DeleteConfirmModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <h4 class="text-center" style="font-size: 15px; margin-bottom: 20px;">등록된 URL을 DB에서 제거하시겠습니까?<br>해당 URL에 등록되어 있던 모든 댓글 데이터가 삭제됩니다!</h4>
              <div class="text-center" style="width: 70%; margin: 0 auto">
                <a class="btn btn-sm btn-danger btn-yes btn-block" style="color:#ffffff;" data-dismiss="modal" onclick="DeleteService()">네</a>
                <!-- data dismiss란 attribute를 줌으로써, 모달 박스를 닫는 이벤트를 구현할 수 있음 -->
                <a class="btn btn-sm btn-success btn-no btn-block" style="color:#ffffff;" data-dismiss="modal">아니오</a>
              </div>
            </div>
        </div>
      </div>
    </div>

    <!-- p는 padding, mt는 margin-top란 의미 (Bootstrap 4 API spacing 참고) -->
    <footer id="Copyright" class="bg-dark p-3 text-center fixed-bottom" style="background-color: #333333 !important"> &copy; 2019 바텀업 프로젝트 <sub>Team EV</sub>&nbsp;</footer>

    <!-- 제이쿼리 자바스크립트 추가하기 -->
    <script src="./lib/jquery-3.2.1.min.js"></script>
    <!-- Popper 자바스크립트 추가하기 -->
    <script src="./lib/popper.min.js"></script>
    <!-- 부트스트랩 자바스크립트 추가하기 -->
    <script src="./lib/bootstrap.min.js"></script>
    <!-- MDB 라이브러리 추가하기 -->
    <script src="./lib/mdb.min.js"></script>
    <!-- 커스텀 자바스크립트 추가하기 -->
    <script src="./js/URL-Register.js"></script>

  </body>
</html>
