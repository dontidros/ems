<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Product;
use App\Order;
use Cart;
use Session;
use DB;

//
class ShopController extends MainController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function categories()
    {

        //Cart::clear();
        Categorie::getCategories(self::$data);
        //$categories = Categorie::all()->toArray();
        self::$data['title'] = 'Shop Categories';
        // self::$data['categories'] = $categories;
        return view('contents.categories', self::$data);
    }

    public function products($curl)
    {
        Categorie::getCategories(self::$data);
        Product::getProducts($curl, self::$data);
        self::$data['curl'] = $curl;
        return view('contents.products', self::$data);
    }
    #the $curl parameter is essential only for reaching the purl
    public function item($curl, $purl)
    {
        Categorie::getCategories(self::$data);
        Product::getItem($purl, self::$data);
        self::$data['curl'] = $curl;
        self::$data['purl'] = $purl;
        return view('contents.item', self::$data);
    }

    public function addToCart(Request $request)
    {
        $pid = $request['pid'];
        Product::addToCart($pid);
    }

    public function checkout()
    {
        $cart = Cart::getContent()->toArray();
        //will keep the items at the same order after every update
        sort($cart);
        self::$data['title'] = 'Shop Checkout';
        self::$data['cart'] = $cart;
        return view('contents.checkout', self::$data);
    }

    public function updateCart(Request $request)
    {
        Product::updateCart($request);
        return redirect('shop/checkout');
    }

    public function clearCart()
    {
        Cart::clear();
        return redirect('shop/checkout');
    }

    public function removeItem(Request $request)
    {
        if (Cart::get($request['pid'])) {
            Cart::remove($request['pid']);
        }
        return redirect('shop/checkout');
    }

    public function orderNow()
    {
        if (Cart::isEmpty()) {
            //the user will arrive to the checkout page where he will get the message that there are no products on cart
            return redirect('shop/checkout');
        }
        //the user must be connented in order to get to order now page
        if (!Session::has('user_id')) {
            return redirect('user/signin?rd=shop/checkout');
        } else {
            Order::save_new();
            return redirect('');
        }
    }
    /**
     * deliver products title into the search input bar dropdown
     * @param Request
     */
    public function search(Request $request)
    {
        $title = $request['title'];

        $products_titles = DB::table('products')
            ->select('ptitle')
            ->get()->toArray();
        if ($products_titles) {
            $titles_json = json_encode($products_titles);
            echo $titles_json;
        } else {
            echo false;
        }
    }

    /**
     * transferring the user into the correct product page after clicking one of the options
     * from the search input bar dropdown  
     * @param Request
     * @return 
     */
    public function getSearchedProduct(Request $request)
    {
        $selectedTitle =  $request['selectedTitle'];
        if ($product = DB::table('products')->where('ptitle', '=', $selectedTitle)->first()) {
            $category = DB::table('categories')->where('id', '=', $product->categorie_id)->first();
            Categorie::getCategories(self::$data);
            Product::getItem($product->purl, self::$data);
            self::$data['curl'] = $category->url;
            self::$data['purl'] = $product->purl;
            return view('contents.item', self::$data);
        }
        abort(404);
    }
}
