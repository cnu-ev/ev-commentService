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
