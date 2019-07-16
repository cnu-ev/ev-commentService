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
}

class CommentBuilder{

  // Comment 객체
  public $comment;

  // Comment 객체를 인자로 받음
  function __construct($_comment){
    $this->comment = $_comment;
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
