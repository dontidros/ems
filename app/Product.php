<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cart;
use Session;
use Image;

class Product extends Model
{
    public static function getProducts($curl, &$data)
    {
        $products = DB::table('products AS p')
            ->join('categories AS c', 'c.id', '=', 'p.categorie_id')
            ->select('p.*', 'c.url', 'c.title')
            ->where('c.url', '=', $curl);
        //->get()->toArray();

        if ($data['total_count'] = $products->count()) {
            $products = $products->paginate(1);
            $data['products'] = $products;
            $data['title'] = $products[0]->title;
        } else {
            abort(404);
        }
    }

    public static function getItem($purl, &$data)
    {
        //first is for only one record which turns to stdClass object
        if ($item = Product::where('purl', '=', $purl)->first()) {
            $data['product'] = $item->toArray();
            $data['title'] = $data['product']['ptitle'];
        } else {
            abort(404);
        }
    }

    public static function addToCart($pid)
    {

        #you must validate that the pid is numeric
        if (!empty($pid) && is_numeric($pid)) {
            if ($product = self::find($pid)) {
                $product = $product->toArray();
                #if the product does not apear in the cart - add it
                if (!Cart::get($pid)) {
                    Cart::add($pid, $product['ptitle'], $product['price'], 1, []);
                    Session::flash('sm', $product['ptitle'] . ' added to cart!');
                }
            }
        }
    }

    public static function updateCart($request)
    {
        if (!empty($request['pid']) && is_numeric($request['pid'])) {
            if (!empty($request['op'])) {
                //the plus and minus operations will be executed 
                //only if this product apears in the cart
                if ($product = Cart::get($request['pid'])) {
                    //this line is not really necessary because we do not use $product
                    $product = $product->toArray();
                    if ($request['op'] == 'plus') {
                        Cart::update($request['pid'], ['quantity' => 1]);
                    } elseif ($request['op'] == 'minus') {
                        Cart::update($request['pid'], ['quantity' => -1]);
                    }
                }
            }
        }
    }

    public static function save_new($request)
    {
        $image_name = 'image_not_available.png';

        if ($request->hasFile('pimage') && $request->file('pimage')->isValid()) {
            $file = $request->file('pimage');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('pimage')->move(public_path() . '/images/', $image_name);
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }

        $product = new self();
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle = $request['ptitle'];
        $product->article = $request['article'];
        $product->purl = $request['purl'];
        $product->pimage = $image_name;
        $product->price = $request['price'];
        $product->save();
        Session::flash('sm', 'Product created successfully');
    }

    public static function update_item($request, $id)
    {
        $image_name = '';

        if ($request->hasFile('pimage') && $request->file('pimage')->isValid()) {
            $file = $request->file('pimage');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('pimage')->move(public_path() . '/images/', $image_name);
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }

        $product = self::find($id);
        $product->categorie_id = $request['categorie_id'];
        $product->ptitle = $request['ptitle'];
        $product->article = $request['article'];
        $product->purl = $request['purl'];
        if ($image_name) {
            $product->pimage = $image_name;
        }
        $product->price = $request['price'];
        $product->save();
        Session::flash('sm', 'Product updated successfully');
    }

    /**
     * gets products amount
     * @param array - main controller's $data array delivered by reference
     */
    public static function getProductsAmount(&$data)
    {
        $data['products_amount'] = DB::select('SELECT COUNT(*) AS c FROM products');
    }
}
