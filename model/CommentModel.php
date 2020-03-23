<?php
class CommentModel{
    var $postid;
    var $content;
    var $username;
    var $commentid;
    var $timestamp;
    
    function __construct($commentid, $content, $username, $postid, $timestamp ){
        $this->postid = $postid;
        $this->content = $content;
        $this->username = $username;
        $this->commentid = $commentid;
        $this->timestamp = $timestamp;
    }

    public function getContent(){
        return $this->content;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getCommentId(){
        return $this->commentid;
    }
    public function getId(){
        return $this->postid;
    }
    public function getTimestamp(){
        return $this->timestamp;
    }
}