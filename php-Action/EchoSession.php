<?php
// 자바스크립트에서 세션 값을 사용해야할 때, ajax로 값을 받아와 사용한다
session_start();
if(isset($_SESSION['user_id'])){
  $arr = array('connectedUserID' => $_SESSION['user_id'], 'connectedUserProfileFileName' => $_SESSION['profileImageFileName']);
}
else {
  $arr = array('connectedUserID' => '', 'connectedUserProfileFileName' => '');
}
echo json_encode($arr);
