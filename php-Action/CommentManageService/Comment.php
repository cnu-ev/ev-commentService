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
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
          <span aria-hidden="true">&times;</span>
        </button>
        <p id="NoCommentsWarning" class="lead" style="font-size: 14px; color: #4c4c4c;">블로그에 등록된 댓글이 없습니다.</p>
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
