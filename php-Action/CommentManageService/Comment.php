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
    $comment = $_comment;
  }

  public function build(){
    return $comment;
  }

  function setCommentUserID($_CommentUserId){
    $comment->$CommentUserId = $_CommentUserId;
  }

  function setContent($_Content){
    $comment->$Content = $_Content;
  }

  function setDateTime($_DateTime){
    $comment->$DateTime = $_DateTime;
  }

  function setProfileImageFileName($_ProfileImageFileName){
    $comment->$ProfileImageFileName = $_ProfileImageFileName;
  }

  function setPageID($_PageID){
    $comment->$PageID = $_PageID;
  }

  function setURL($_URL){
    $comment->$URL = $_URL;
  }

  function setPostTitle($_PostTitle){
    $comment->$PostTitle = $_PostTitle;
  }

}
