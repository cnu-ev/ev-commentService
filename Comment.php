<?php
  require_once('php-Action\UserModalBox.php');
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

      if(empty($ProfileImageFileName)){
        $ProfileImageFileName = 'img/userDefaultProfile.svg';
      }
      else{
        $ProfileImageFileName =  'profileImages/' . $ProfileImageFileName;
      }

      $profileImageElement = sprintf(
        '<img class="comment-avatar col-1.5" width="48px" height="48px" class="img-fluid rounded-circle" src="%s" alt="Image For User Profile">',
        $ProfileImageFileName
      );

      // 본인이 단 댓글인 경우, Edit, Delete Button을 활성화 함
      if(!empty($_COOKIE["connectedUserID"]) && $_COOKIE["connectedUserID"] == $CommentUserId){
        $ElementsOnMyComment =
        '
        <span><img src="./img/trash-2.svg" width="16px" height="16px" onclick="deleteComment($(this).closest(\'li\').attr(\'id\'))"></span>
        <span><img src="./img/edit.svg" width="16px" height="16px" onclick="editComment($(this).parent().prevAll(\'p\').attr(\'id\')), $(this).next()"></span>
        <span style="display: none;" class="sendCommentUpdateButton"><img src="./img/send.svg" width="16px" height="16px" onclick="sendCommentUpdateMessage($(this).parent().prevAll(\'p\').attr(\'id\'))"></span>
        ';
      }
      else {
        $ElementsOnMyComment = "";
      }

      return sprintf(
      '
        <li id="ev-comment-%s" class="row comment">
          %s
          <div class="comment col-10">
            <span class="comment-userID">%s</span>
            <span style="color: #777777; font-size: 12px;">&nbsp;&nbsp;&nbsp;%s</span>
            <br>
            <p id="comment-content-%s" class="comment-content">%s</p><br>
            %s
          </div>
        </li>',
          $CommentIndex,
          $profileImageElement,
          $CommentUserId,
          $DateTime,
          $CommentIndex,
          $Content,
          $ElementsOnMyComment
        );
      }
   }


   // 로그인 되어 있다면 (쿠키가 존재하면), 해당하는 ID의 프로필 사진을 찾아 띄우고
   // 로그인 되어 있지 않다면 프로필 사진 대신 로그인 버튼을 띄운다.
   if(empty($_COOKIE["connectedUserID"])){
     $LoginButton = '<li id="EV-Login" style="float:right;" class="nav-tab" data-toggle="modal" data-target="#LogInModal">Login</li>';
   }
   else{

     $connect_userdb = MySQLConnection::DB_Connect("userdb");

     $fetchMyProfileImage = "
       SELECT * FROM usersinfotbl WHERE ID = '" . $_COOKIE["connectedUserID"] . "'";

     $ret = mysqli_query($connect_userdb, $fetchMyProfileImage);

     $row = mysqli_fetch_array($ret);

     $myProfileImageName = $row['ProfileImageFileName'];

     if(empty($myProfileImageName)){
       $myProfileImageElement = '
       <li id="EV-Logout" style="float:right;" onclick="logout()">Logout</li>
       <li style="float:right;"><img id="connectedUser-Avatar" class="comment-avatar" data-toggle="modal" data-target="#UserInfoModal" width="25px" height="25px" class="img-fluid rounded-circle" src="img/userDefaultProfile.svg" alt="Image For User Profile"></li>';
     }
     else{
      $myProfileImageElement ='
      <li id="EV-Logout" style="float:right;" onclick="logout()">Logout</li>
      <li style="float:right;"><img id="connectedUser-Avatar" class="comment-avatar" data-toggle="modal" data-target="#UserInfoModal" width="25px" height="25px" class="img-fluid rounded-circle" src="profileImages/'. $myProfileImageName .'" alt="Image For User Profile"></li>';
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
        onHeightChange();
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
              <span id="Textarea-placeholder" onclick="textAreaClicked()">여기에 텍스트를 입력하세요..</span>
              <div id="CommentArea" class="alignLeft" width="100%" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" class="text-right" title="Join the discussion..."></div>
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

      <!-- fade 클래스를 이용해 애니메이션을 줌 -->
      <!-- tabindex에 대해선 오른쪽 참고 https://developers.google.com/web/fundamentals/accessibility/focus/using-tabindex?hl=ko -->
      <div id="UserInfoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <!-- modal-sm, modal-md, modal-lg는 modal 창 크기에 대한 부트스트랩 속성임 -->
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <?php
              if(empty($_COOKIE['profileImageFileName'])){
                echo UserModalBox::GenerateUserInfoModal($_COOKIE["connectedUserID"], '');
              }
              else{
                echo UserModalBox::GenerateUserInfoModal($_COOKIE["connectedUserID"], $_COOKIE['profileImageFileName']);
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
                  <input id="ID" name="ID" type="text" class="form-control">
                </div>
                <div class="form-group">
                  <label for="PW">PW</label>
                  <input id="PW" name="PW" type="password" class="form-control">
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
  <!-- 쿠키 사용 라이브러리 추가하기 -->
  <script src="./lib/jquery.cookie.js"></script>
  <!-- 커스텀 자바스크립트 추가하기 -->
  <script src="./js/comment.js"></script>

</html>
