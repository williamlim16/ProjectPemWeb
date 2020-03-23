<?php
class CommentModel{
    var $postid;
    var $content;
    var $username;
    var $commentid;
    
    function __construct($commentid, $content, $username, $postid ){
        $this->postid = $postid;
        $this->content = $content;
        $this->username = $username;
        $this->commentid = $commentid;
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
}