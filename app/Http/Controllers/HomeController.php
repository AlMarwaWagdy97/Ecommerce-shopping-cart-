<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Categorie;

use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        return view('home');
    }

    public function shoping(){
        $categories = Categorie::all();
        return view('includes.shoping', compact('categories'));
    }

    public function GetAddToCard(Request $request, $id){
        $categories = Categorie::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart, $categories->id);
        $cart->add($categories, $categories->id);
        $request->session()->put('cart', $cart);
        // dd( $request->session()->get('cart'));
        return redirect('shoping');
    }

    public function GetCart(){
        if(!Session::has('cart')){
            return view('includes.cart_shopping');
        }
        else{
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            return view('includes.cart_shopping', ['products' => $cart->items, 'TotalPrice' => $cart->TotalPrice, 'TotalQul' => $cart->TotalQuant]);
        }
    }

    public function ReduceOne(Request $request,$id){
        if(!Session::has('cart')){
            return view('includes.cart_shopping');
        }
        else{

            $gategory = Categorie::find($id);
            $oldCart = Session::get('cart');
            $oldCart->items[$id]['Quantity']--;
            $oldCart->TotalPrice = $oldCart->TotalPrice - (int)$gategory['price'];
            $oldCart->TotalQuant = $oldCart->TotalQuant-1 ;
            // delete item 
            if($oldCart->items[$id]['Quantity'] <= 0){
                $key = array_search($oldCart->items[$id], $oldCart->items);
                unset($oldCart->items[$key]);
            }
            $request->session()->put('cart', $oldCart);

            return view('includes.cart_shopping', ['products' => $oldCart->items, 'TotalPrice' => $oldCart->TotalPrice, 'TotalQul' => $oldCart->TotalQuant]);
        }
    }


    public function DeleteItem(Request $request, $id){
        $gategory = Categorie::find($id);
        $oldCart = Session::get('cart');
        $oldCart->TotalPrice = $oldCart->TotalPrice - ((int)$gategory['price']*(int)$oldCart->items[$id]['Quantity']);
        $oldCart->TotalQuant = $oldCart->TotalQuant - (int)$oldCart->items[$id]['Quantity'];
        $oldCart->items[$id]['Quantity'] = 0;
        $key = array_search($oldCart->items[$id], $oldCart->items);
        unset($oldCart->items[$key]);
        $request->session()->put('cart', $oldCart);

        return view('includes.cart_shopping', ['products' => $oldCart->items, 'TotalPrice' => $oldCart->TotalPrice, 'TotalQul' => $oldCart->TotalQuant]);

    }



    public function checkout(){
        if(!Session::has('cart')){
            return view('includes.cart_shopping');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
    }
    
}
