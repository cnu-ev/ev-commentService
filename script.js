// var verification_URL = "http://www.evcommentservice.ga/php-Action/URLVerification.php";
var verification_URL = "http://localhost/php-Action/URLVerification.php";

$.ajax({
    type: "GET",
    url : verification_URL,
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
