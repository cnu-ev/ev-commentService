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

  function __construct($_CommentUserId, $_Content, $_DateTime, $_ProfileImageFileName, $_PageID, $_URL, $_PostTitle){
    $this->CommentUserId = $_CommentUserId;
    $this->Content = $_Content;
    $this->DateTime = $_DateTime;
    $this->ProfileImageFileName = $_ProfileImageFileName;
    $this->PageID = $_PageID;
    $this->URL = $_URL;
    $this->PostTitle = $_PostTitle;
  }
}
