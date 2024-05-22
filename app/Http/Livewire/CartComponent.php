<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty +1;
        Cart::instance('cart')->update($rowId, $qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty -1;
        $this->emitTo('cart-count-component','refreshComponent');
        Cart::instance('cart')->update($rowId, $qty);
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item deleted successfully');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout("layouts.base");
    }
}
