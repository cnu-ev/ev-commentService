<?php
  // 세션에 ID가 있다면, 로그인 된 상태이므로 바로 URL-Register로 이동
  session_start();

  $UserID = $_SESSION['user_id'];

  // 세션에 ID가 없다면, 이용할 수 없으니, SignIn 페이지로 이동
  if(!isset($UserID)){
    echo ("<script language=javascript>alert('먼저 로그인하세요!')</script>");
    echo ("<script>location.href='SignIn.php';</script>");
    exit();
  }

  require_once('./php-Action/MySQLConection.php');
  require_once('php-Action\UserModalBox.php');

  $connect_object = MySQLConnection::DB_Connect('userdb');

  $URLID = $_GET['db'];
  $Title = $_GET['title'];


?>

<!DOCTYPE html>
<html lang="kr">
  <head>
    <title><?=$Title;?></title>
    <!-- meta 데이터 정의 -->
    <meta charset="utf-8">
    <meta name="description" content="Comment Manage Service">
    <meta name="keywords" content="Sentimental Analysis Comment Service">
    <meta name="author" content="Team EV">
    <!-- 반응형 웹페이지 구현을 위한 meta 데이터 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/CommentManageService.css">
    <!-- Favicon 적용 -->
    <link rel="shortcut icon" size="16x16" href="./img/favicon.ico" />
  </head>

  <body id="Background">
    <div class="container">
      <!-- 인라인으로 스타일을 준 것은, bootstrap.css에서 색상 속성이 !important로 선언되어 있기 때문임. boostrap 파일을 변경하기보단, 인라인으로 새 속성을 주었음 -->
      <nav id="FixedNavbar" class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #333333 !important">

        <a class="navbar-brand" href="#"><img src="img/smile.svg" style="margin-right: 10px;"><?=$Title;?></a>

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
          <button type="button" class="side_btn sizeUpOnHover"><img src="img/arrow-left.svg" alt="return login page" onclick="location.href='URL-Register.php'"></img></button>
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

    <section class="mt-1" style="padding-top: 75px; padding-left: 5%; padding-right: 5%;">
      <div class="row">
        <div class="col-md-3" style="margin-bottom: 15px;">
          <div id="AnalysisButtons" class="list-group">
            <a id="Analysis-recentComments" href="#" class="list-group-item active" onclick="selectButtons(this.id)">최근 생성된 댓글</a>
            <a id="Analysis-positiveness" href="#" class="list-group-item" onclick="selectButtons(this.id)">긍정도 분석</a>
            <a id="Analysis-popularness" href="#" class="list-group-item" onclick="selectButtons(this.id)">인기 포스팅 분석</a>
            <a id="Analysis-postsSortingByCommentsNumber" href="#" class="list-group-item" onclick="selectButtons(this.id)">댓글이 많은 게시물</a>
          </div>
        </div>

        <div id="ServiceSection" class="col-md-9">
        </div>

      </div>
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
            // ID 검색
            $searchUserID = "
              SELECT * FROM usersinfotbl WHERE ID = '$UserID'
            ";

            $ret_userID = mysqli_query($connect_object, $searchUserID);
            $row_userID = mysqli_fetch_array($ret_userID);

            echo UserModalBox::GenerateUserInfoModal($row_userID['ID'], $row_userID['ProfileImageFileName']);
          ?>
        </div>
      </div>
    </div>

    <!-- p는 padding, mt는 margin-top란 의미 (Bootstrap 4 API spacing 참고) -->
    <div id="FooterDiv" class="navbar p-1 fixed-bottom" style="background-color: #333333 !important">
      <footer id="Copyright" class="p-3 text-center"> &copy; 2019 바텀업 프로젝트 <sub>Team EV</sub>&nbsp;</footer>
    </div>

    <!-- 제이쿼리 자바스크립트 추가하기 -->
    <script src="./lib/jquery-3.2.1.min.js"></script>
    <!-- Popper 자바스크립트 추가하기 -->
    <script src="./lib/popper.min.js"></script>
    <!-- 부트스트랩 자바스크립트 추가하기 -->
    <script src="./lib/bootstrap.min.js"></script>
    <!-- MDB 라이브러리 추가하기 -->
    <script src="./lib/mdb.min.js"></script>
    <!-- 커스텀 자바스크립트 추가하기 -->
    <script src="./js/CommentManageService.js"></script>
    <!-- Chart JS 추가 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>

  </body>
</html>
