<!--
@ Author : jopemachine
@ Team : team ⓒ EV for BottomUp
@ Created : 2019-07-15, 13:57:28
-->


<?php

// DB의 Comment 레코드 하나를 담기 위한 클래스
class Comment{
  public $CommentUserId;
  public $Content;
  public $DateTime;
  public $ProfileImageFileName;
  public $PageID;
  public $URL;
  public $PostTitle;

  // 아무일도 하지 않는 생성자
  function __construct(){}

  // 댓글이 전혀 없는 경우 표시하는 Warning
  public static function WarnNoComments(){

    return sprintf('
      <div class="list-group">
        <a class="list-group-item active" style="background-color: #474747!important; color: #ffffff; border: none !important;">에러</a>
        <div class="list-group-item">
          <p class="lead">아직 등록된 댓글이 없습니다!</p>
        </div>
      </div>
    ');
  }
}

class CommentBuilder{

  // Comment 객체
  public $comment;

  // Comment 객체를 인자로 받음
  function __construct(){
    $this->comment = new Comment();
  }

  public function build(){
    return $this->comment;
  }

  function setCommentUserID($_CommentUserId){
    $this->comment->CommentUserId = $_CommentUserId;
    return $this;
  }

  function setContent($_Content){
    $this->comment->Content = $_Content;
    return $this;
  }

  function setDateTime($_DateTime){
    $this->comment->DateTime = $_DateTime;
    return $this;
  }

  function setProfileImageFileName($_ProfileImageFileName){
    $this->comment->ProfileImageFileName = $_ProfileImageFileName;
    return $this;
  }

  function setPageID($_PageID){
    $this->comment->PageID = $_PageID;
    return $this;
  }

  function setURL($_URL){
    $this->comment->URL = $_URL;
    return $this;
  }

  function setPostTitle($_PostTitle){
    $this->comment->PostTitle = $_PostTitle;
    return $this;
  }

}
