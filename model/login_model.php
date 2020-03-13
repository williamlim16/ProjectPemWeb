<?php
class loginCheck
{
    var $username;
    var $password;
    // comment
    function __construct($susername, $spassword)
    {
        $this->username = $susername;

        $this->password = $spassword;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function setusername($str)
    {
        $this->username    = $str;
    }
    public function setpassword($str)
    {
        $this->password = $str;
    }
}
