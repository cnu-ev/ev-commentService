var profileImage;

// 클라이언트 쪽에서 유효성 검사를 하고, 유효한 경우에만 넘어감
function SubmitButtonClicked(){

  // 아래 코드 작동 안 함. 고칠 것.

  // 비밀번호와 비밀번호 확인이 같은 값인지 검사
  if($('#PW').val() != $('#PW_Confirm').val()){
    alert('비밀번호가 비밀번호 확인과 맞지 않습니다');
    return false;
  }
  // ID와 비밀번호의 형식을 검사

  else if($('#PW').val().length < 4){
    alert('비밀번호는 4 자리 이상이어야 합니다');
    return false;
  }
  else if($('#ID').val().length < 4){
    alert('ID는 대소문자 알파벳으로 시작해야 하며, 4자리 이상이어야 합니다');
    return false;
  }

  return true;
}

function ToLogin(){
  location.href='SignIn.html';
}

function UserID_DuplicateCheck(){
  $.ajax({
    type: "GET",
    url : "php-Action/ID_DuplicateCheck.php",
    data: { userID : $('#ID').val() },

    success : function(data, status, xhr) {
      console.log("서버로 채팅 데이터 전송 성공" + data);
      alert(data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Ajax 전송에 실패했습니다!" + jqXHR.responseText);
    }
  });
}

function changeProfileImage(value){

  $('#userDefaultProfile').hide();
  $('#userProfileImage').show();

  var canvas = document.getElementById('userProfileImage');
  var canvasContext = canvas.getContext("2d");

  canvas.width = 80;
  canvas.height = 80;

  if(value.files && value.files[0]){
    var reader = new FileReader();
    reader.readAsDataURL(value.files[0]);
    // readAsDataURL 메서드는 컨텐츠를 특정 Blob 이나 File에서 읽어 오는 역할

    reader.onload = function(e){

      profileImage = new Image();
      profileImage.src = reader.result;

      profileImage.onload = function(){
        canvasContext.drawImage(this, 0, 0, 80, 80);
      }
    }
  }
}

function manButtonClick(){
  $('#Gender').val('man');
}

function womanButtonClick(){
  $('#Gender').val('woman');
}
