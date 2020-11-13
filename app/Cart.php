<?php

namespace App;

class Cart{
    public $items;    
    public $TotalQuant= 0;    
    public $TotalPrice = 0;
    
    public function __construct($OldCard){
        if($OldCard){
            $this->items = $OldCard->items;
            $this->TotalQuant = $OldCard->TotalQuant;
            $this->TotalPrice = $OldCard->TotalPrice;
        }
    }

    public function Add($item, $id){
        $storedItem = ['Quantity' => 0, 'price'=> $item->price, 'item'=>$item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['Quantity']++;
        // $storedItem['price'] = $item->price * $storedItem['Quantity'];
        $this->items[$id] = $storedItem;
        $this->TotalQuant++;
        $this->TotalPrice +=$storedItem['price'];
    }
}
