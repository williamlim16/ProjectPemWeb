<?php
class CommentModel{
    var $postid;
    var $content;
    var $username;
    var $commentid;
    var $timestamp;
    var $picture;
    
    function __construct($commentid, $content, $username, $postid, $timestamp, $picture ){
        $this->postid = $postid;
        $this->content = $content;
        $this->username = $username;
        $this->commentid = $commentid;
        $this->timestamp = $timestamp;
        $this->picture = $picture;
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
    public function getPicture(){
        return $this->picture;
    }
}