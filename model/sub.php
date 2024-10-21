<?php
require_once APP_DIR . '/app/db.php';

class sub
{
    public $sid;
    public $sname;
    public function url(): string
    {
        return 'http://localhost:8080/bookstore/sub?sub_id=' . $this->sid;
    }
    public function books($page = 1): array
    {
        $db = (new db)->db();
        $q = $db->prepare("SELECT * FROM books WHERE sid=:sid LIMIT 10 OFFSET :offset;");
        $q->bindValue(':offset', 10 * ($page - 1), PDO::PARAM_INT);
        $q->bindValue(':sid', $this->sid, PDO::PARAM_INT);
        $q->execute();
        return $q->fetchAll(PDO::FETCH_CLASS, book::class);
    }

    public static function find($id): self
    {
        $db = (new db)->db();
        $q = $db->prepare('SELECT * FROM subs WHERE sid=? LIMIT 1;');
        $q->execute([$id]);
        return $q->fetchObject(__CLASS__);
    }

    public static function create($name): bool
    {
        $db = (new db)->db();
        $q = $db->prepare('INSERT INTO subs (sname) values (?);');
        return $q->execute([$name]);
    }
    public function update($name): bool
    {
        $db = (new db)->db();
        $q = $db->prepare('UPDATE subs  SET sname=:sname WHERE sid=:sid;');
        $q->bindValue(':sname', $name);
        $q->bindValue(':sid', $this->sid);
        return $q->execute();
    }

    public function delete(): bool
    {
        $db = (new db)->db();
        $q = $db->prepare('DELETE FROM subs WHERE sid=?;');
        return $q->execute([$this->sid]);
    }

    public function booksCount(): int
    {
        $db = (new db)->db();
        $q = $db->prepare('SELECT COUNT(*) FROM books WHERE sid=?;');
        $q->execute([$this->sid]);
        return $q->fetchColumn();
    }

    public static function all(): array
    {
        $db = (new db)->db();
        $q = $db->prepare("SELECT * FROM subs;");
        $q->execute();
        return $q->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
}
