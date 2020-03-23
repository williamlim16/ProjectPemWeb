<?php

class User
{
    var $username;
    var $firstName;
    var $lastName;
    var $password;
    var $bdate;
    var $phonenum;
    var $gender;
    var $profilePicturePath;
    var $coverPath;
    var $contact;
    var $userdesc;
    function __construct($susername, $sfirstName, $slastName, $spassword, $sbdate, $sphonenum, $sgender, $sprofilePicturePath, $scoverPath, $scontact, $suserdesc)
    {
        $this->username = $susername;
        $this->firstName = $sfirstName;
        $this->lastName = $slastName;
        $this->password = $spassword;
        $this->bdate = $sbdate;
        $this->phonenum = $sphonenum;
        $this->gender = $sgender;
        $this->profilePicturePath = $sprofilePicturePath;
        $this->coverPath = $scoverPath;
        $this->contact = $scontact;
        $this->userdesc = $suserdesc;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function getbdate()
    {
        return $this->bdate;
    }
    public function getphonenum()
    {
        return $this->phonenum;
    }
    public function getgender()
    {
        return $this->gender;
    }
    public function getprofilePicturePath()
    {
        return $this->profilePicturePath;
    }
    public function getcoverPath()
    {
        return $this->coverPath;
    }
    public function getcontact()
    {
        return $this->contact;
    }
    public function getuserdesc()
    {
        return $this->userdesc;
    }
    public function setusername($str)
    {
        $this->username    = $str;
    }
    public function setfirstName($str)
    {
        $this->firstName   = $str;
    }
    public function setlastName($str)
    {
        $this->lastName   = $str;
    }
    public function setpassword($str)
    {
        $this->password = $str;
    }
    public function setbdate($str)
    {
        $this->bdate = $str;
    }
    public function setphonenum($str)
    {
        $this->phonenum = $str;
    }
    public function setgender($str)
    {
        $this->gender = $str;
    }
    public function setprofilePicturePath($str)
    {
        $this->profilePicturePath = $str;
    }
    public function setcoverPath($str)
    {
        $this->coverPath = $str;
    }
    public function setcontact($str)
    {
        $this->contact = $str;
    }
    public function setuserdesc($str)
    {
        $this->userdesc = $str;
    }
}
