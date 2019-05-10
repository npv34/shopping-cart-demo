<?php


namespace App;


class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id)
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            //Kiem tra san pham da ton tai trong gio hang chua
            //Neu co roi thi cap nhat so luong sp
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            } else {
                echo  $id;
            }
        }

        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;

        //Tang tong so luong san pham trong gio hang
        $this->totalQty++;
        //Tinh tong gia tien trong gi hang
        $this->totalPrice += $item->price;

    }
}
