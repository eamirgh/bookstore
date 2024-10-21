<?php
require_once APP_DIR . '/app/db.php';
require_once APP_DIR . '/model/sub.php';

class book
{
    public $bid;
    public $bname;
    public $author;
    public $des;
    public $price;
    public $cover;
    public $status;
    public $sid;

    public function url(): string
    {
        return 'http://localhost:8080/bookstore/book?bid=' . $this->bid;
    }
    public function sub(): sub
    {
        return sub::find($this->sid);
    }

    public static function find($id): self
    {
        $db = (new db)->db();
        $q = $db->prepare('SELECT * FROM books WHERE bid=? LIMIT 1;');
        $q->execute([$id]);
        return $q->fetchObject(__CLASS__);
    }

    public static function get(): array
    {
        $db = (new db)->db();
        $q = $db->prepare('SELECT * FROM books LIMIT 10;');
        $q->execute();
        return $q->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function all(): array
    {
        $db = (new db)->db();
        $q = $db->prepare("SELECT * FROM books;");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function search($query): array
    {
        $db = (new db)->db();
        $q = $db->prepare("SELECT * FROM books WHERE bname LIKE '%$query%';");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function create($name, $author, $price, $sid, $des, $cover, $status): bool
    {
        $db = (new db)->db();
        $q = $db->prepare('INSERT INTO books (bname, author, price, sid, des, cover, status) values (:name, :author, :price, :sid, :des, :cover, :status) ;');
        $q->bindValue(':name', $name);
        $q->bindValue(':author', $author);
        $q->bindValue(':price', $price);
        $q->bindValue(':sid', $sid);
        $q->bindValue(':des', $des);
        $q->bindValue(':cover', $cover);
        $q->bindValue(':status', value: $status);
        return $q->execute();
    }

    public function update($name, $author, $price, $sid, $des, $cover, $status): bool
    {
        $db = (new db)->db();
        $q = $db->prepare('UPDATE books  SET bname=:name, author=:author, price=:price, sid=:sid, des=:des, cover=:cover, status=:status WHERE bid=:bid ;');
        $q->bindValue(':bid', $this->bid);
        $q->bindValue(':name', $name);
        $q->bindValue(':author', $author);
        $q->bindValue(':price', $price);
        $q->bindValue(':sid', $sid);
        $q->bindValue(':des', $des);
        $q->bindValue(':cover', $cover);
        $q->bindValue(':status', value: $status);
        return $q->execute();
    }
}
