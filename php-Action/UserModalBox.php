<!--
@ File Name : UserModalBox.php
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-03, 14:35:37
@ Desc : 
@    유저의 정보를 보여주는 ModalBox를 나타내는 함수가 정의되어 있습니다. Comment.php와 evCommentService.ga 홈페이지에서 모두 이용합니다.
-->


<?php

class UserModalBox{

  static public function GenerateUserInfoModal($UserID, $ProfileImageFileName){

    // 프로필 이미지 지정해 놓은 게 없는 경우, 디폴트 이미지를 표시
    if(empty($ProfileImageFileName)){
      $ProfileImageFileName = 'img/userDefaultProfile.svg';
    }
    else{
      $ProfileImageFileName = 'profileImages/' . $ProfileImageFileName;
    }

    return sprintf('
      <div id="smallModal" class="container" style="text-align: center;">
        <p id="Modal_USER_ID" class="lead">%s</p><br>
        <img id="userDefaultProfile" class="img-fluid rounded-circle" src="%s" alt="Image For User Profile">
      </div>
    ', $UserID, $ProfileImageFileName);
  }

}
