<?php

require_once APP_DIR . '/model/book.php';
require_once APP_DIR . '/model/item.php';

class cart
{
    public $id;
    public $items = [];

    public static function load(): self
    {
        return array_key_exists('cart', $_SESSION) ? unserialize($_SESSION['cart']) : new self;
    }

    public function save()
    {
        $_SESSION['cart'] = serialize($this);
    }

    public function total(): int
    {
        $sum = 0;
        foreach ($this->items as $i) {
            $sum = $i->price * $i->qty;
        }
        return $sum;
    }

    public function add($bookId): self
    {
        $book = book::find($bookId);
        if (count($this->items) == 0) {
            $i = new item($book);
            $this->items[] = $i;
            return $this;
        }
        foreach ($this->items as $key => $i) {
            if ($i->bid == $bookId) {
                $this->items[$key]->qty = $i->qty + 1;
            }
        }
        return $this;
    }

    public function plus($bookId): self
    {
        foreach ($this->items as $key => $i) {
            if ($i->bid == $bookId) {
                $this->items[$key]->qty = $i->qty + 1;
            }
        }
        return $this;
    }

    public function minus($bookId): self
    {
        foreach ($this->items as $key => $i) {
            if ($i->bid == $bookId) {
                if ($i->qty - 1 > 0) {
                    $this->items[$key]->qty = $i->qty - 1;
                } else {
                    return $this->remove($bookId);
                }
            }
        }
        return $this;
    }

    public function remove($bookId): self
    {
        foreach ($this->items as $key => $i) {
            if ($i->bid == $bookId) {
                unset($this->items[$key]);
            }
        }
        return $this;
    }

    public static function action($method, $bid): string
    {

        return match ($method) {
            'add' => APP_URL . "/cart?method=$method&bid=$bid",
            'minus' => APP_URL . "/cart?method=$method&bid=$bid",
            'plus' => APP_URL . "/cart?method=$method&bid=$bid",
            'remove' => APP_URL . "/cart?method=$method&bid=$bid"
        };
    }
}
