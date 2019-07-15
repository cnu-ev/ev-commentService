// 왼쪽 버튼을 누르면 해당하는 php Action을 실행해 serviceSection에 띄운다.
var urlID = getParameterByName('db');

// 디폴트로 Analysis-recentComments가 클릭되게 한다.
window.onload = function(){
  selectButtons('Analysis-recentComments');
}

function selectButtons(clickedButton){

  var selectedButton = $('#AnalysisButtons').children('.active');

  // 클릭한 버튼이 이미 활성화 된 버튼인 경우, 아무 작업도 하지 않음.
  if($('#' + clickedButton).attr('class') == $('#AnalysisButtons').children('.active').attr('id')){
    return;
  }
  // 이외의 경우라면 기존 버튼에서 active를 제거하고 클릭된 버튼에 active를 준다.
  else{
    selectedButton.removeClass('active');
    $('#' + clickedButton).addClass('active');
  }

  switch (clickedButton) {
    case "Analysis-recentComments":
      $.ajax({
        type: "POST",
        url : "../php-Action/CommentManageService/recentComments.php",
        data: {
          URLID : urlID,
        },

        success : function(data, status, xhr) {
          $('#ServiceSection').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("Ajax 전송에 실패했습니다!" + jqXHR.responseText);
        }
      });
      break;
    case "Analysis-visitorsNumber":

      break;
    case "Analysis-positiveness":

      break;
    case "Analysis-postsSortingByCommentsNumber":
      $.ajax({
        type: "POST",
        url : "../php-Action/CommentManageService/PostsSortingByCommentsNumber.php",
        data: {
          URLID : urlID,
        },

        success : function(data, status, xhr) {
          $('#ServiceSection').html(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          console.log("Ajax 전송에 실패했습니다!" + jqXHR.responseText);
        }
      });
      break;

    case "Analysis-popularness":
      break;
  }

}

// get 방식 파라미터 값을 가져오는 함수
// http://naminsik.com/blog/3070 참고
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
