<?php
  require_once('php-Action\MySQLConection.php');

  $URL_ID = $_GET['db'];
  $PageID = $_GET['pageID'];

  $connect_object = MySQLConnection::DB_Connect($URL_ID);

  $fetchAllComments = "
    SELECT * FROM `" . $PageID . "`";

  class Comment{

    static public function CreateComment($CommentUserId, $Content, $DateTime, $ProfileImageFileName, $CommentIndex){

      #############################################################
      #                                                           #
      #  프로필 이미지 지정해 놓은 게 없는 경우, 디폴트 이미지를 표시  #
      #                                                           #
      #############################################################

      if(empty($profileImageName)){
        $ProfileImageFileName = 'img/userDefaultProfile.svg';
      }
      else{
        $ProfileImageFileName =  'profileImages/' . $profileImageName;
      }

      $profileImageElement = sprintf(
        '<img class="comment-avatar col-1.5" width="48px" height="48px" class="img-fluid rounded-circle" src="%s" alt="Image For User Profile">',
        $ProfileImageFileName
      );

      return sprintf(
      '
        <li class="row">
          %s
          <div class="comment col-10">
            <span class="comment-userID">%s</span><br>
            <p class="comment-content">%s</p>
          </div>
        </li>',
          $profileImageElement,
          $CommentUserId,
          $Content
        );
      }
   }

   // 로그인 되어 있다면 (쿠키가 존재하면), 해당하는 ID의 프로필 사진을 찾아 띄우고
   // 로그인 되어 있지 않다면 프로필 사진 대신 로그인 버튼을 띄운다.
   $UserID = $_COOKIE["connectedUserID"];

   $fetchMyProfileImage = "
     SELECT * FROM usersinfotbl WHERE ID = " . $UserID;

   $ret = mysqli_query($connect_object, $fetchMyProfileImage);

   $row = mysqli_fetch_array($ret);

   if(empty($UserID)){
     $LoginButton = '<li id="EV-Login" style="float:right;" class="nav-tab" data-toggle="modal" data-target="#LogInModal">Login</li>';
   }

   else {
     $ret = mysqli_query($connect_object, $fetchMyProfileImage);
     $row = mysqli_fetch_array($ret);
     $myProfileImageName = $row['ProfileImageFileName'];

     $myProfileImageElement = '<li style="float:right;"><img id="connectedUser-Avatar" class="comment-avatar" width="25px" height="25px" class="img-fluid rounded-circle" src="profileImages/'. $myProfileImageName .'" alt="Image For User Profile"></li>';
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
    <link rel="stylesheet" href="./css/comment.css">
    <script type="text/javascript">
      window.onload = function (){

        // iframe이 load 되고 나서 부모 프레임에 height를 전달함.
        // 부모 프레임은 자식 프레임의 origin을 확인해 evcommentservice.ga에서 올라온 메시지를
        // 높이 메시지로 취급하고 iframe의 height 속성에 적용한다
        window.parent.postMessage({ height: document.body.scrollHeight }, '*');
      };
    </script>
  </head>
  <body>
    <div id="EV-Container" class="container">
      <!-- 현재 댓글의 갯수, 로그인 되어 있는 ID를 나타내는 NavBar -->
      <header id="EV-nav">
        <ul>
          <li id="EV-CommentNumber" class="nav-tab">Comments</li>
          <li id="EV-UserID" class="nav-tab"></li>
          <li id="EV-Feedback" class="nav-tab"></li>
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
              <span id="Textarea-placeholder">여기에 텍스트를 입력하세요..</span>
              <div id="CommentArea" class="alignLeft" width="100%" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" class="text-right" title="Join the discussion..."></div>
            </div>
          <div id="EV-Buttons">
            <ul>
              <li><b>B</b></li>
              <li><i>I</i></li>
              <li><u>U</u></li>
              <li><s>S</s></li>
              <li id="post-button">제출</li>
            </ul>
          </div>
          <p id="recommendLoginAlert" class="lead" style="font-size: 14px; color: #4c4c4c; display: none;">페이지에 로그인하시겠습니까?<br>익명으로 댓글을 남기시려면 제출을 한 번 더 클릭해주세요.</p>
        </div>
        <hr>
        <!-- 댓글 -->
        <div id="EV-comment">
          <ul>
            <?php
              $ret = mysqli_query($connect_object, $fetchAllComments);

              while($row = mysqli_fetch_array($ret)){
                echo Comment::CreateComment(
                  $row['CommentUserId'],
                  $row['Content'],
                  $row['DateTime'],
                  $row['ProfileImageFileName'],
                  $row['CommentIndex']
                );
              }
            ?>
          </ul>
        </div>
      </div>
      <hr>

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
                  <input id="ID" name="ID" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="PW">PW</label>
                  <input id="PW" name="PW" type="text" class="form-control">
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
