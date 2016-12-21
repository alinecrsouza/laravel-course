<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    //add one item to the cart
    public function add($id, $name, $price){
        $this-> items += [
            $id =>[
                'qtd'=> isset($this->items[$id]['qtd'])? $this->items[$id]['qtd']++:1,
                'price' => $price,
                'name'=> $name
            ]
        ];

        return $this->items;
    }

    //remove one item from the cart
    public function remove($id){
        unset($this->items[$id]);
    }

    //return all items of the cart
    public function all_items(){
        return $this->items;
    }

    //return the total value of the cart
    public function getTotal(){
        $total = 0;
        foreach ($this->items as $item){
            $total += $item['qtd'] * $item['price'];
        }
        return $total;
    }

    //updates the quantity of an item on the cart
    public function updateQtyItem($id, $qty){
        $this->items[$id]['qtd'] = $qty;
        return $this->items[$id]['qtd'];
    }

    public function clear(){
        $this->items = [];
    }

}
