// 쟝고 감정 분석 서버 URL (full, binary 모드에서 사용)
var EmotionalAnalysisServiceURL = "https://emotionanalysisservice.ga/changer/comment";
var EmotionalAnalysisServiceReportURL = "https://emotionanalysisservice.ga/changer/report";

var connectedUserID;
var profileImageFileName;
var postTitle;

var urlID = getParameterByName('db');
var pageID = getParameterByName('pageID');
var evMode = getParameterByName('mode');

window.onload = function(){

  connectedUserID = $('#EV-ConnectedUserID').html();
  profileImageFileName = $('#EV-ConnectedUserIDProfileImageFileName').html();
  postTitle = $('#EV-PostTitle').html();
  containerLoad();
}

function containerLoad(){
  $('#EV-Loader').hide();
  $('#EV-Container').show();
  onHeightChange();
}

// B, I, U, S 등 편집기의 각 버튼이 클릭 되었을 때의 이벤트 처리를
// 모두 담당하는 함수
function editButtonClicked(clickedButton){

  selectedText = $('#CommentArea').html();

  switch (clickedButton) {
    case "EV-Buttons-B":
      $('#CommentArea').html("&ltb&gt" + selectedText + "&lt/b&gt");
      break;
    case "EV-Buttons-I":
      $('#CommentArea').html("&lti&gt" + selectedText + "&lt/i&gt");
      break;
    case "EV-Buttons-U":
    $('#CommentArea').html("&ltu&gt" + selectedText + "&lt/u&gt");
      break;
    case "EV-Buttons-S":
      $('#CommentArea').html("&lts&gt" + selectedText + "&lt/s&gt");
      break;
    case "EV-Buttons-CommentSubmit":
      if(verifyComment() == true){
        postComment();
      }
      break;
  }
}

// 코드 양, 중복을 없애기 위해 사용
function ajaxRequest(type, url, dataArr, success, error){
  $.ajax({
    type: type,
    url : url,
    data: dataArr,
    success : success,
    error: error
  });
}

// 클릭되거나, 텍스트가 입력되면 placeholder를 숨김
function textAreaClicked(){
  $('#CommentArea').focus();
  $('#Textarea-placeholder').hide();
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

  // 로그인 되어 있지 않은 경우 우선 로그인을 권유하는 알림을 띄운다
  if(connectedUserID == '' && !($('#recommendLoginAlert').is(":visible"))){
    $('#recommendLoginAlert').show();
    onHeightChange();
    return;
  }

  // url을 PHP로 넘겨야 하기 때문에 주소 값을 파싱해서 파라미터 값을 php로 전송해야 한다
  const commentContent = $('#CommentArea').html();

  let arg = {
    commentContent : commentContent,
    urlID : urlID,
    pageID : pageID,
    profileImageFileName : profileImageFileName,
    postTitle: postTitle
  };

  switch (evMode) {

    case "full":
      // 감정 분석 서비스를 받고, 성공한 경우 댓글 관리 서비스에 데이터를 넘겨준다
      ajaxRequest("POST", EmotionalAnalysisServiceURL, {commentContent : commentContent},
        // Success
        (data)=>{
            arg.emotionalAnalysisValue = data;
            ajaxRequest("POST", "../php-Action/AddComment.php", arg, () => { location.reload(); }, ()=>{});
        },
        // Error
        ()=>{});

      break;

    case "binary":
      // 감정 분석 서비스를 받고, 성공한 경우 댓글 관리 서비스에 데이터를 넘겨준다
      ajaxRequest("POST", EmotionalAnalysisServiceURL, {commentContent : commentContent},
        // Success
        (data)=>{
            arg.emotionalAnalysisValue = (parseInt(data)) > 0 ? 30 : -30;
            ajaxRequest("POST", "../php-Action/AddComment.php", arg, () => { location.reload(); }, ()=>{});
        },
        // Error
        ()=>{});
      break;

    case "none":

      ajaxRequest("POST", "../php-Action/AddComment.php", arg, () => { location.reload(); }, ()=>{});
      break;

    default:
      // 디폴트 값은 full이지만, 예외처리는 넣어놓았다
      console.log("Error:: mode value is one of 'full, binary, none'");
      throw new Error("Assert failed: mode value is one of 'full, binary, none'");
      break;
  }
}

var reportCommentID;
var reportCommentContent;
var isPositive;

function reportButtonClicked(id, content, isPositive){
  // id 중 숫자만 추출
  reportCommentID = id.replace(/[^0-9]/g,"");
  reportCommentContent = content;

  let reverse = (isPositive > 0) ? "부정" : "긍정";
  $('#ReportCommentContent').html('"' + content + '"' + " 다음 댓글을 " + reverse + "으로 평가하시겠습니까?");
}

function reportComment(){

  let arg = {
    CommentID : reportCommentID,
    CommentContent : reportCommentContent
  };

  ajaxRequest("POST", EmotionalAnalysisServiceReportURL, arg,
    // Success
    ()=>{},
    // Fail
    ()=>{}
  );

}

function deleteComment(id){

  // id 중 숫자만 추출
  let arg = {
    userID : connectedUserID,
    CommentID : id.replace(/[^0-9]/g,""),
    urlID : urlID,
    pageID : pageID
  };

  ajaxRequest("POST", "../php-Action/DeleteComment.php", arg,
    // Success
    ()=>{location.reload();},
    // Fail
    ()=>{}
  );

}

// 클릭되거나, 텍스트가 입력되면 placeholder를 숨김

$('#CommentArea').click(function(){
  textAreaClicked();
});

// 높이가 변하면 부모 프레임에 높이를 전달
function onHeightChange(){
  window.parent.postMessage({ height: document.body.scrollHeight }, '*');
}

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

// 현재 댓글을 수정 중인지를 나타내는 boolean 변수
var isEditMode = false;

// 수정 중인 (수정 중이었던) Comment의 ContentID
var editCommentContentID;
var editCommentContent;

// 현재 수정 상태라면 수정을 취소하는 명령으로,
// 현재 수정 상태가 아니라면 editArea로 만드는 명령으로 작동
function editComment(id, submitButton){
  if(isEditMode){
    $('#' + editCommentContentID).removeAttr('contenteditable');
    $('#' + editCommentContentID).removeClass('editArea');
    $('#' + editCommentContentID).html(editCommentContent);
    $('#' + editCommentContentID).nextAll('.sendCommentUpdateButton').hide();

    if(id == editCommentContentID) {
      isEditMode = false;
      onHeightChange();
      return;
    }
  }

  isEditMode = true;
  editCommentContentID = id;
  editCommentContent = $('#' + id).html();
  submitButton.show();
  $('#' + id).attr('contenteditable', 'PLAINTEXT-ONLY');
  $('#' + id).addClass('editArea');
  onHeightChange();
}

// 수정 버튼을 클릭하면 댓글 내용을 수정하기 위한 조치를 한 후, 제출 버튼 (이미지)을 추가한다.
// 그 상태에서 제출 버튼을 클릭하면, sendCommentUpdateMessage 가 실행되어 Ajax로 EditComment.php 내 코드를 실행해
// DB 에서 해당 레코드 Comment Content를 수정한다
function sendCommentUpdateMessage(contentID){

  let arg = {
    userID : connectedUserID,
    CommentID : contentID.replace(/[^0-9]/g,""),
    urlID : urlID,
    pageID : pageID,
    updatedContent : $('#' + contentID).html()
  }

  switch (evMode) {

    case "full":
      // 감정 분석 서비스를 받고, 성공한 경우 댓글 관리 서비스에 데이터를 넘겨준다
      ajaxRequest("POST", EmotionalAnalysisServiceURL, {commentContent : commentContent},
        (data, status, xhr) => {
          arg.emotionalAnalysisValue = data;
          ajaxRequest("POST", "../php-Action/EditComment.php", arg,
            // Success
            ()=>{location.reload();},
            // Fail
            ()=>{}
          );
        },
        ()=>{}
      );

    // binary는 full과 동일하게 작동
    case "binary":
      break;

    case "none":
      ajaxRequest("POST", "../php-Action/EditComment.php", arg,
        ()=>{location.reload();},
        ()=>{}
      );
      break;

    default:
      console.log("Error:: mode value is one of 'full, binary, none'");
      break;
  }
}
