// success시, iframe 태그를 부모 창에 전송함 
(async function(){
  $.ajax({
      crossOrigin: true,
      type: "GET",
      url : "https://evcommentservice.ga/php-Action/URLVerification.php",
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

});

window.addEventListener('message', function(e) {
  if(e.origin == "https://evcommentservice.ga"){
    document.getElementById('EV-Iframe').height = e.data.height;
  }
});
