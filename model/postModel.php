<?php
class PostModel
{
    var $postid;
    var $content;
    var $username;
    var $timestamp;
    var $picture;
    var $photos;

    function __construct($postid, $content, $username, $timestamp, $picture, $photos)
    {
        $this->postid = $postid;
        $this->content = $content;
        $this->username = $username;
        $this->timestamp = $timestamp;
        $this->picture = $picture;
        $this->photos = $photos;
        // $this->postcount = $postcount;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getTimestamp()
    {
        return $this->timestamp;
    }
    public function getPicture()
    {
        return $this->picture;
    }
    public function getId()
    {
        return $this->postid;
    }
    public function getPhotos()
    {
        return $this->photos;
    }
    // public function getPostCount()
    // {
    //     return $this->postcount++;
    // }
    // public function setusername($str)
    // {
    //     $this->username = $str;
    // }
    // public function setpassword($str)
    // {
    //     $this->password = $str;
    // }
}
