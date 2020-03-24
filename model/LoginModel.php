<?php
class LoginModel
{
    var $username;
    var $password;
    var $pp;

    function __construct($username, $password, $pp)
    {
        $this->username = $username;

        $this->password = $password;
        $this->pp = $pp;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function getProfilePicture()
    {
        return $this->pp;
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
