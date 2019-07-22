<?php

  session_start();

  require_once('php-Action\UserModalBox.php');
  require_once('php-Action\MySQLConection.php');

  // 해당 홈페이지를 나타내는 파라미터
  $URL_ID = $_GET['db'];
  // 해당 홈페이지의 서브 도메인을 가리키는 파라미터
  $PageID = $_GET['pageID'];
  // 해당 블로그 홈페이지의 Pagination이 몇 페이지를 가리키는지 나타내는 파라미터 (디폴트 값은 항상 1)
  $PaginationID = $_GET['paginationID'];
  // 어떻게 감정분석 결과를 나타낼 것인지 나타내는 mode
  $EmotionalAnalysisMode = $_GET['mode'];
  // 몇 개의 댓글을 기준으로 Pagination 할 것인지를 나타내는 int 값. 나중에 get 방식으로 받아오게 따로 빼서 확장해도 괜찮을 거 같다.
  $PaginationDivision = 10;

  $connectedUserProfileFileName = '';

  if(isset($_SESSION['user_id'])){
    $connectedUserID = $_SESSION['user_id'];
    $connectedUserProfileFileName = $_SESSION['profileImageFileName'];
  }

  $connect_object = MySQLConnection::DB_Connect($URL_ID);

  // 방문 정보를 기록한다.
  date_default_timezone_set('Asia/Seoul');

  // 데이터가 전송된 시간 (방문 시간)
  $visitDateTime = date("Y-m-d H:i:s");
  // 방문한 클라이언트의 IP 주소
  $visitorIP = $_SERVER['REMOTE_ADDR'];

  // 어떤 홈페이지에서 방문한 것인지 정보가 있다면 가져온다.
  if(isset($_SERVER['HTTP_REFERER'])) $prevPage = $_SERVER['HTTP_REFERER'];
  else $prevPage = "";

  if(empty($_SESSION['visit-' . $PageID])) {

    $_SESSION['visit-' . $PageID] = 1;

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
        '$PageID'
      )";

    $ret = mysqli_query($connect_object, $insertVisitorInfo) or die("Error Occured in Inserting Data to DB");
  }

  // 포스팅 제목을 DB에서 가져옴
  $selectTitle = "
    SELECT Title FROM pagetitlepairs WHERE PageID = '$PageID'
  ";

  $selectTitleRet = mysqli_query($connect_object, $selectTitle);

  $title = mysqli_fetch_array($selectTitleRet);

  // 포스팅 제목
  $PostTitle = $title[0];

  // 최근 작성된 댓글부터 출력하기 위해 내림차순으로 조회한다
  $fetchAllComments = "
    SELECT * FROM `" . $PageID . "` ORDER BY CommentIndex DESC";

  class Comment{

    static public function WarnNoCommentsToShow(){
      return sprintf('
        <div class="alert alert-secondary alert-dismissible fade show">
          <button type="button" class="close" aria-label="Close" data-dismiss="alert">
            <span aria-hidden="true">&times;</span>
          </button>
          <p id="NoCommentWarning" class="lead" style="font-size: 14px; color: #4c4c4c;">등록된 댓글이 없습니다.</p>
        </div>
      ');
    }

    static public function CreateComment($CommentUserId, $Content, $DateTime, $ProfileImageFileName, $CommentIndex, $Positiveness){

      global $connectedUserID;
      global $connectedUserProfileFileName;

      #############################################################
      #                                                           #
      #  프로필 이미지 지정해 놓은 게 없는 경우, 디폴트 이미지를 표시  #
      #                                                           #
      #############################################################

      if(empty($ProfileImageFileName)){
        $ProfileImageFileName = 'img/userDefaultProfile.svg';
      }
      else{
        $ProfileImageFileName =  'profileImages/' . $ProfileImageFileName;
      }

      $profileImageElement = sprintf(
        '<img class="comment-avatar rounded-circle" class="img-fluid rounded-circle" src="%s" alt="Image For User Profile">',
        $ProfileImageFileName
      );

      // 본인이 단 댓글인 경우, Edit, Delete Button을 활성화 함
      if(isset($connectedUserID) && $connectedUserID == $CommentUserId){
        $ElementsOnMyComment =
        '
        <span><img src="./img/trash-2.svg" width="16px" height="16px" onclick="deleteComment($(this).closest(\'li\').attr(\'id\'))"></span>
        <span><img src="./img/edit.svg" width="16px" height="16px" onclick="editComment($(this).parent().prevAll(\'p\').attr(\'id\'), $(this).parent().next())"></span>
        <span style="display: none;" class="sendCommentUpdateButton"><img src="./img/send.svg" width="16px" height="16px" onclick="sendCommentUpdateMessage($(this).parent().prevAll(\'p\').attr(\'id\'))"></span>
        ';
      }
      else {
        $ElementsOnMyComment = "";
      }

      // 댓글의 긍정도에 따라, class를 달리 붙임.
      $positiveClass = "";

      if($Positiveness < 0){
        switch((int)((-1) * $Positiveness / 10)){
          case 0:
            $positiveClass = "comment-negative01";
            break;
          case 1:
            $positiveClass = "comment-negative02";
            break;
          case 2:
            $positiveClass = "comment-negative03";
            break;
          case 3:
            $positiveClass = "comment-negative04";
            break;
          case 4:
            $positiveClass = "comment-negative05";
            break;
        }
      }
      else if($Positiveness > 0){
        switch((int) ($Positiveness / 10)){
          case 0:
            $positiveClass = "comment-positive01";
            break;
          case 1:
            $positiveClass = "comment-positive02";
            break;
          case 2:
            $positiveClass = "comment-positive03";
            break;
          case 3:
            $positiveClass = "comment-positive04";
            break;
          case 4:
            $positiveClass = "comment-positive05";
            break;
        }
      }
      // 긍정도 값이 셋팅되지 않은 경우
      else {
        $positiveClass = "comment-neutral";
      }

      return sprintf(
      '
        <li id="ev-comment-%s" class="row comment %s">
          %s
          <div class="comment">
            <span class="comment-userID">%s</span>
            <span style="color: #777777; font-size: 12px;">&nbsp;&nbsp;&nbsp;%s</span>
            <br>
            <p id="comment-content-%s" class="comment-content">%s</p>
            %s
          </div>
        </li>
        <hr>
        ',
          $CommentIndex,
          $positiveClass,
          $profileImageElement,
          $CommentUserId,
          $DateTime,
          $CommentIndex,
          html_entity_decode($Content),
          $ElementsOnMyComment
        );
      }
   }

   // 로그인 되어 있다면 (쿠키가 존재하면), 해당하는 ID의 프로필 사진을 찾아 띄우고
   // 로그인 되어 있지 않다면 프로필 사진 대신 로그인 버튼을 띄운다.
   if(!isset($connectedUserID)){
     $LoginButton = '<li id="EV-Login" style="float:right;" class="nav-tab" data-toggle="modal" data-target="#LogInModal">Login</li>';
   }
   else{

     $connect_userdb = MySQLConnection::DB_Connect("userdb");

     $fetchMyProfileImage = "
       SELECT * FROM usersinfotbl WHERE ID = '" . $connectedUserID . "'";

     $ret = mysqli_query($connect_userdb, $fetchMyProfileImage);

     $row = mysqli_fetch_array($ret);

     $myProfileImageName = $row['ProfileImageFileName'];

     if(empty($myProfileImageName)){
       $myProfileImageElement = '
       <li id="EV-Logout" style="float:right;" onclick="location.href=\'./php-Action/CommentPageLogout.php\'">Logout</li>
       <li id="connectedUser-AvatarList" style="float:right;"><img id="connectedUser-Avatar" data-toggle="modal" data-target="#UserInfoModal" class="img-fluid" src="img/userDefaultProfile.svg" alt="Image For User Profile"></li>';
     }
     else{
      $myProfileImageElement ='
      <li id="EV-Logout" style="float:right;" onclick="location.href=\'./php-Action/CommentPageLogout.php\'">Logout</li>
      <li id="connectedUser-AvatarList" style="float:right;"><img id="connectedUser-Avatar" data-toggle="modal" data-target="#UserInfoModal" class="img-fluid" src="profileImages/'. $myProfileImageName .'" alt="Image For User Profile"></li>';
     }
   }

?>

<!DOCTYPE html>
<html lang="kr" dir="ltr">
  <head>
    <title>EV Comments</title>
    <meta charset="utf-8">
    <!-- 반응형 웹페이지를 위한 viewport 설정 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap 스타일 시트를 적용. min이 붙은 것은 난독화 파일이기 때문.-->

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- 댓글 서비스의 css 시트. -->
    <link rel="stylesheet" href="./css/comment.css">

  </head>
  <body>

    <?php
    // 자바스크립트에서 사용할 ID, 프로필 사진 이름 및 postTitle
    if (isset($connectedUserID)) {
      echo sprintf('
        <p id="EV-ConnectedUserID">%s</p>
        <p id="EV-ConnectedUserIDProfileImageFileName">%s</p>
        <p id="EV-PostTitle">%s</p>
      ', $connectedUserID, $connectedUserProfileFileName, $PostTitle);
    }
    else {
      echo sprintf('
        <p id="EV-ConnectedUserID"></p>
        <p id="EV-ConnectedUserIDProfileImageFileName"></p>
        <p id="EV-PostTitle">%s</p>
      ', $PostTitle);
    }
    ?>

    <div id="EV-Container" class="container">
      <!-- 현재 댓글의 갯수, 로그인 되어 있는 ID를 나타내는 NavBar -->
      <header id="EV-nav">
        <ul>
          <li id="EV-CommentNumber" class="nav-tab">Comments</li>
          <?php
            if(empty($myProfileImageElement)){
              echo $LoginButton;
            }
            else{
              echo $myProfileImageElement;
            }
          ?>
        </ul>
      </header>
      <!-- 댓글 창들의 모음 컨테이너 -->
      <div>
        <div id="EV-UserInputArea">
          <!-- Avatar (셋팅된 프로필 사진) -->
            <!-- 댓글 입력 창 -->
            <div class="textarea-outer col-sm-12">
              <span id="Textarea-placeholder" onclick="textAreaClicked()">여기에 텍스트를 입력하세요..</span>
              <p id="CommentArea" class="alignLeft" width="100%" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" class="text-right" title="Join the discussion..."></p>
            </div>
          <!-- 텍스트 에디터 내에 해당 태그를 붙여주는 버튼들이다. -->
          <div id="EV-Buttons">
            <ul>
              <li id="EV-Buttons-B" onclick="editButtonClicked(this.id)"><b>B</b></li>
              <li id="EV-Buttons-I" onclick="editButtonClicked(this.id)"><i>I</i></li>
              <li id="EV-Buttons-U" onclick="editButtonClicked(this.id)"><u>U</u></li>
              <li id="EV-Buttons-S" onclick="editButtonClicked(this.id)"><s>S</s></li>
              <li id="EV-Buttons-CommentSubmit" onclick="editButtonClicked(this.id)" style="float: right;">제출</li>
            </ul>
          </div>
          <div id="recommendLoginAlert" class="alert alert-success alert-dismissible fade show" style="display: none;">
            <p class="lead" style="font-size: 14px; color: #4c4c4c;">Ev Comment 서비스에 로그인하시겠습니까?<br>익명으로 댓글을 남기시려면 제출을 한 번 더 클릭해주세요.</p>
          </div>
        </div>
        <hr>
        <!-- 댓글 -->
        <div id="EV-comment">
          <ul>
            <?php

              $commentsRet = mysqli_query($connect_object, $fetchAllComments);

              $commentsNumber = mysqli_num_rows($commentsRet);

              // 몇 페이지가 끝인 지 계산
              if(($commentsNumber % $PaginationDivision) == 0){
                $PaginationEnd = (int)($commentsNumber / $PaginationDivision);
              }
              else {
                $PaginationEnd = (int)($commentsNumber / $PaginationDivision) + 1;
              }

              // 댓글이 없는 경우 처리
              if($commentsNumber < 1) echo Comment::WarnNoCommentsToShow();

              // $PaginationID에 따른 포인터 ($row) 이동
              for($i = 0; $i < ($PaginationID - 1) * $PaginationDivision; $i++){

                if($i >= $commentsNumber) break;

                $row = mysqli_fetch_array($commentsRet);
              }

              // $PaginationDivision만큼 댓글을 push 하다 댓글이 더 없을 때 break.
              for($i = 0; $i < $PaginationDivision; $i++){

                $comment = mysqli_fetch_array($commentsRet);

                if(empty($comment)) break;

                // $CommentContent에 XSS 공격이 가해질 경우에 대한 대처로, strip_tags를 사용했다
                // 댓글을 올릴 때와, echo할 때 모두 적용한다.
                $CommentContent = strip_tags($comment['Content'], '<b><i><s><u>');

                echo Comment::CreateComment(
                  $comment['CommentUserId'],
                  $CommentContent,
                  $comment['DateTime'],
                  $comment['ProfileImageFileName'],
                  $comment['CommentIndex'],
                  $comment['EmotionalAnalysisValue']
                );
              }
            ?>
          </ul>
        </div>
      </div>

      <!-- fade 클래스를 이용해 애니메이션을 줌 -->
      <!-- tabindex에 대해선 오른쪽 참고 https://developers.google.com/web/fundamentals/accessibility/focus/using-tabindex?hl=ko -->
      <div id="UserInfoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <!-- modal-sm, modal-md, modal-lg는 modal 창 크기에 대한 부트스트랩 속성임 -->
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <?php
              if(!isset($connectedUserProfileFileName)){
                echo UserModalBox::GenerateUserInfoModal($connectedUserID, '');
              }
              else{
                echo UserModalBox::GenerateUserInfoModal($connectedUserID, $connectedUserProfileFileName);
              }
            ?>
          </div>
        </div>
      </div>

      <div id="LogInModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">EV Comment Service 로그인</h5>
              <!-- data-dismiss 속성을 통해, 취소 버튼을 누르면 모달 박스가 없어지는 것을 구현 -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <!-- times를 x 버튼 대신 이용함 -->
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="php-Action/CommentPageLogin.php" method="post" accept-charset="utf-8">
                <div class="form-group">
                  <label for="ID">ID</label>
                  <input id="ID" name="ID" type="text" class="form-control" required>
                </div>
                <div class="form-group">
                  <label for="PW">PW</label>
                  <input id="PW" name="PW" type="password" class="form-control" required>
                </div>
                <div class="modal-footer">
                  <!-- data-dismiss 속성을 통해, 취소 버튼을 누르면 모달 박스가 없어지는 것을 구현 -->
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">취소</button>
                  <button type="submit" class="btn btn-primary">로그인</button>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div id="EV-Pagination">

        <?php

          // 1 페이지에 있는 경우 왼쪽 버튼을 눌러도 1 페이지로 이동
          $laquo_paginationID = $PaginationID == 1 ? 1 : $PaginationID - 1;
          $raquo_paginationID = $PaginationID == $PaginationEnd ? $PaginationEnd : $PaginationID + 1;

          echo sprintf('
            <a href="https://evcommentservice.ga/Comment.php?db=%s&pageID=%s&mode=%s&paginationID=%s">&laquo;</a>
          ', $URL_ID, $PageID, $EmotionalAnalysisMode, $laquo_paginationID);

          // $PaginationDivision (페이지 나누는 기준)
          // $PaginationID (현재 페이지)
          // $PaginationEnd (끝 페이지)

          // 페이지네이션 할 수 있는 숫자를 몇 개까지 표시할 것인지 나타내는 int형 변수
          // (값을 바꿔도 되지만, 웹페이지 디자인 상 홀수여야 균형이 맞아보이니 주의)
          $paginatorsNumber = 5;

          // 현재 페이지가 앞 쪽에 치우친 경우 (1부터 순차대로 $paginatorsNumber 수 만큼 출력)
          if($PaginationEnd < $paginatorsNumber || $PaginationID - (int)($paginatorsNumber / 2) <= 0){
            $startPoint = 1;
          }

          // 현재 페이지가 뒤 쪽에 치우친 경우 (순차대로 $paginatorsNumber 수 만큼 출력)
          else if($PaginationEnd - $PaginationID < (int)($paginatorsNumber / 2)){

            $startPoint = $PaginationEnd - $paginatorsNumber + 1;

          }
          // 페이지를 중앙에 놓으면 되는 경우
          else {
            $startPoint = $PaginationID - (int)($paginatorsNumber / 2);
          }

          for($i = $startPoint; $i < $startPoint + $paginatorsNumber; $i++){

            // 반복문이 끝나기 전 Paginator가 끝나면 break
            if($i > $PaginationEnd) break;

            // $paginationID와 같은 Paginator에 Active 클래스를 달아놓는다.
            if($i == $PaginationID) $Active = 'active';
            else $Active = '';

            echo sprintf('
              <a class="%s" href="https://evcommentservice.ga/Comment.php?db=%s&pageID=%s&mode=%s&paginationID=%s">%s</a>
            ', $Active, $URL_ID, $PageID, $EmotionalAnalysisMode, $i, $i);
          }

          echo sprintf('
            <a href="https://evcommentservice.ga/Comment.php?db=%s&pageID=%s&mode=%s&paginationID=%s">&raquo;</a>
          ', $URL_ID, $PageID, $EmotionalAnalysisMode, $raquo_paginationID);
        ?>

      </div>
      <footer id="EV-Footer">
        <p style="padding-top: 7px;">&copy; 2019 Team EV</p>
      </footer>
    </div>
  </body>

  <!-- 제이쿼리 자바스크립트 추가하기 -->
  <script src="./lib/jquery-3.2.1.min.js"></script>
  <!-- Popper 자바스크립트 추가하기 -->
  <script src="./lib/popper.min.js"></script>
  <!-- 부트스트랩 자바스크립트 추가하기 -->
  <script src="./lib/bootstrap.min.js"></script>
  <!-- MDB 라이브러리 추가하기 -->
  <script src="./lib/mdb.min.js"></script>
  <!-- 커스텀 자바스크립트 추가하기 -->
  <script src="./js/comment.js"></script>

</html>
