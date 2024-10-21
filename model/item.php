<?php

require_once APP_DIR . '/model/book.php';

class item
{
    public $tid;
    public $oid;
    public $bid;
    public $price;
    public $qty;

    function __construct($book)
    {
        $this->bid = $book->bid;
        $this->price = $book->price;
        $this->qty = 1;
    }

    public function url(): string
    {
        $p = book::find($this->bid);
        return $p->url();
    }

    public function name(): string
    {
        $p = book::find($this->bid);
        return $p->bname;
    }
}
