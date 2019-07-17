<?php

require_once('MySQLConection.php');

class ShowHomePage{

  public static function WarnNoHomePagesToShow(){

    return sprintf('
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
        <p id="NoServiceWarning" class="lead" style="font-size: 14px; color: #4c4c4c;"><br>등록된 홈페이지가 존재하지 않습니다. <br><br>우측 상단바의 + 버튼을 눌러 새 홈페이지를 등록해보세요! </p>
      </div>
    ');
  }

  public static function ShowHomePages($HomePage_Title, $HomePage_URL, $HomePage_ID){

    return sprintf('
      <div id="%s" class="jumbotron service" style="padding: 33px 32px 30px 32px;">
        <div class="row">
          <div class="col-sm-11">
            <h1 class="display-6">Title : %s</h1>
          </div>
          <div class="col-sm-1">
            <img src="img/trash-2.svg" class="responsiveSmall sizeUpOnHover" style="width: 32px; height:32px;" data-toggle="modal" onclick="setIndexToDeleteRoom(this.parentNode.parentNode.parentNode.id)" data-target="#DeleteConfirmModal" alt="Homepage Delete Button" />
          </div>
        </div>
        <hr class="my-2">
        <p class="MessageContent">URL : %s</p>
        <button class="btn btn-secondary btn-lg Buttons" type="button" name="RoomID" onclick="ToCommentManagePage(\'%s\', \'%s\')">댓글 분석 페이지로 이동</button>
        <button class="btn btn-danger btn-lg Buttons responsiveSmallReverse" type="button" data-toggle="modal" onclick="setIndexToDeleteRoom(this.parentNode.id)" data-target="#DeleteConfirmModal">댓글 서비스 삭제</button>
      </div>
    ',
    $HomePage_ID,
    $HomePage_Title,
    $HomePage_URL,
    $HomePage_Title, $HomePage_ID);
  }

}
