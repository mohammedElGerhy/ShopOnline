<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\MainCategory;
use App\Models\Offer;
use App\Models\Supcategory;
use App\Models\User;
use Cart;
use Illuminate\Http\Request;
use LaravelLocalization;
class ProfileControll extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Item::latest()->select(
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name' ,
            'id'


        )-> get();
     // $test =  $maincats -> id;
       $main = MainCategory::whereHas('supcategory')->select(
           'name_' . LaravelLocalization::getCurrentLocale() . ' as name' ,
           'id',
           'active'

       )->where('active', 0)-> get();
       $sub = Supcategory::whereHas('item')->select(
           'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
           'id', 'maincategory_id', 'active')->where('active', 0)-> get();

        return view('front.home',compact(   'main', 'sub', 'products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getitem($id)
    {
        $products = Item::where('subcat_id', $id)-> select(
            'name_'. LaravelLocalization::getCurrentLocale() . ' as name',
            'price',
            'quantity',
            'id'
        )->get();
        $main = MainCategory::whereHas('supcategory')->select(
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name' ,
            'id',
            'active'

        )->where('active', 0)-> get();
        $sub = Supcategory::whereHas('item')->select(
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'id', 'maincategory_id', 'active')->where('active', 0)-> get();

        return view('front.itemshow',compact(   'products', 'main', 'sub'));

    }
##################### function shopping cart #############################
    public function add(item $product)
    {
        // add the product to cart
        \Cart::session(auth()->id())->add(array(
            'id' => $product->id,
            'name' => $product->name_.LaravelLocalization::getCurrentLocale() ,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));



        return redirect()->route('front.show');

    }
    public function showCart()
    {

        $cartItems = \Cart::session(auth()->id())->getContent();

        $main = MainCategory::whereHas('supcategory')->select(
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name' ,
            'id',
            'active'

        )->where('active', 0)-> get();
        $sub = Supcategory::whereHas('item')->select(
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'id', 'maincategory_id', 'active')->where('active', 0)-> get();
        return view('front.show', compact('cartItems', 'main', 'sub'));
    }

    public function destroy($itemId)
    {

        \Cart::session(auth()->id())->remove($itemId);

        return back();
    }

    public function update($rowId)
    {

        \Cart::session(auth()->id())->update($rowId, [
            'quantity' => [
                'relative' => false,
                'value' => request('quantity')
            ]
        ]);

        return back();
    }


##################### function shopping cart #############################
        public function logout () {
        auth()->guard('web')->logout();

        return redirect() -> route('front.home');;

    }

}
