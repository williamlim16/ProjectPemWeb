<?php
class LoginModel
{
    var $username;
    var $password;

    function __construct($username, $password)
    {
        $this->username = $username;

        $this->password = $password;
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
        $this->username = $str;
    }
    public function setpassword($str)
    {
        $this->password = $str;
    }
}