// 컴포넌트를 부르고 이벤트를 등록
(async function(){
  $.ajax({
      type: "GET",
      url : "http://evcommentservice.ga/php-Action/URLVerification.php",
      data : {
          UserName : userName,
          PageIdentifier : pageIdentifier,
          SiteURL : siteURL,
      },
      dataType:"HTML",

      success : function(response) {
          $('#EV-Start').append(response);
      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log("Ajax 수신에 실패했습니다!" + jqXHR.responseText);
      }
  });
})().then(() =>{
  registerFunction();
});

// 클릭되거나, 텍스트가 입력되면 placeholder를 숨김
function hidePlaceholder(){
  $('#Textarea-placeholder').hide();
}

function registerFunction(){

  $('#CommentArea').click(function(){
    hidePlaceholder();
  });
}

window.addEventListener('message', function(e) {
  if(e.origin == "http://evcommentservice.ga"){
    console.log(e.data);
    console.log(e.origin);
    document.getElementById('the_iframe').height = e.data.height;
  }
});
