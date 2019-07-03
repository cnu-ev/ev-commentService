function logout(){
  // 저장해 두었던 로그인 관련 쿠키들을 삭제함
  $.removeCookie('connectedUserID');
  $.removeCookie('profileImageFileName');
  location.href ='SignIn.html';
}
