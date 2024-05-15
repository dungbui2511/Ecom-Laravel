<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty +1;
        Cart::update($rowId, $qty);
        return redirect()->route('product.cart');
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty -1;
        Cart::update($rowId, $qty);
        return redirect()->route('product.cart');
    }
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('product.cart');
        session()->flash('success_message','Item deleted successfully');
    }
    public function render()
    {
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
