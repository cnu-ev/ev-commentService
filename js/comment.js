// B, I, U, S 등 편집기의 각 버튼이 클릭 되었을 때의 이벤트 처리를
// 모두 담당하는 함수
function editButtonClicked(clickedButton){
  switch (clickedButton) {
    case "EV-Buttons-B":
      break;
    case "EV-Buttons-I":
      break;
    case "EV-Buttons-U":
      break;
    case "EV-Buttons-S":
      break;
    case "EV-Buttons-CommentSubmit":
      if(verifyComment() == true){
        postComment();
      }
      break;

  }
}

// 댓글이 안전한 형식인지 검사하는 함수.
function verifyComment(){
  if($('#CommentArea').html() == ''){
    return false;
  }
  return true;
}

// 제출 버튼을 클릭해 댓글을 달 때 실행되는 함수
function postComment(){

  var userID = $.cookie('connectedUserID');
  var profileImageFileName = $.cookie('profileImageFileName');

  // 로그인 되어 있지 않은 경우 우선 로그인을 권유하는 알림을 띄운다
  if(userID == null && !($('#recommendLoginAlert').is(":visible"))){
    $('#recommendLoginAlert').show();
    return;
  }

  // 위 상태에서 한 번 더 제출 버튼을 클릭하면 익명으로 댓글을 남기기 위해,
  // UserID에 Anonymous (익명)을 저장한다
  // 댓글 등록 시간은 클라이언트가 보내는 시간이 아니라, DB에 저장되는 시간으로 저장한다.
  // profileImageFileName의 Null 처리는 여기서 하지 않음에 주의.
  if(userID == null){
    userID = 'Anonymous';
  }

  // url을 PHP로 넘겨야 하기 때문에 주소 값을 파싱해서 파라미터 값을 php로 전송해야 한다

  $.ajax({
    type: "POST",
    url : "../php-Action/AddComment.php",
    data: {
      userID : userID,
      commentContent : $('#CommentArea').html(),
      urlID : getParameterByName('db'),
      pageID : getParameterByName('pageID'),
      profileImageFileName : profileImageFileName
    },

    success : function(data, status, xhr) {
      console.log("서버로 채팅 데이터 전송 성공" + data);

    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("Ajax 전송에 실패했습니다!" + jqXHR.responseText);
    }
  });

}

// 클릭되거나, 텍스트가 입력되면 placeholder를 숨김
function hidePlaceholder(){
  $('#Textarea-placeholder').hide();
}

$('#CommentArea').click(function(){
  hidePlaceholder();
});


// get 방식 파라미터 값을 가져오는 함수
// http://naminsik.com/blog/3070 참고
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


// 커서를 마지막 위치로 이동시킴
// 지금 당장은 필요 없지만 댓글에 이미지를 포함시키는 기능을 추가한다면 필요해질 것
// https://stackoverflow.com/questions/4609405/set-focus-after-last-character-in-text-box
function focusCampo(id){
    var inputField = document.getElementById(id);
    if (inputField != null && inputField.value.length != 0){
        if (inputField.createTextRange){
            var FieldRange = inputField.createTextRange();
            FieldRange.moveStart('character',inputField.value.length);
            FieldRange.collapse();
            FieldRange.select();
        }else if (inputField.selectionStart || inputField.selectionStart == '0') {
            var elemLen = inputField.value.length;
            inputField.selectionStart = elemLen;
            inputField.selectionEnd = elemLen;
            inputField.focus();
        }
    }else{
        inputField.focus();
    }
}
