<?php

class user
{
    public $uid;
    public $uname;
    public $mobile;
    public $addr;
    protected $pass;
    public $role;
    public $status;

    public function password(): string
    {
        return $this->pass;
    }

    public static function findByMobile($mobile): self
    {
        $db = (new db)->db();
        $q = $db->prepare('SELECT * FROM users WHERE mobile=? LIMIT 1;');
        $q->execute([$mobile]);
        return $q->fetchObject(__CLASS__);
    }
}
