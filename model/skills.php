<?php
class Skills
{
    var $username;
    var $skills;
    var $percentage;

    function __construct($username, $skills, $percentage)
    {
        $this->username = $username;
        $this->skills = $skills;
        $this->percentage = $percentage;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function getskills()
    {
        return $this->skills;
    }
    public function getpercentage()
    {
        return $this->percentage;
    }
    public function setusername($str)
    {
        $this->username = $str;
    }
    public function setskills($str)
    {
        $this->skills = $str;
    }
    public function setpercentage($str)
    {
        $this->percentage = $str;
    }
}
