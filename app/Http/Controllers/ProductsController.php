<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use Session;
use App\Categorie;
use App\Product;

class ProductsController extends MainController
{

  public function index()
  {
    self::$data['products'] = Product::all()->toArray();
    return view('cms.products', self::$data);
  }


  public function create()
  {
    self::$data['categories'] = Categorie::all()->toArray();
    return view('cms.add_product', self::$data);
  }


  public function store(ProductsRequest $request)
  {
    Product::save_new($request);
    return redirect('cms/products');
  }


  public function show($id)
  {
    self::$data['item_id'] = $id;
    return view('cms.delete_product', self::$data);
  }


  public function edit($id)
  {
    self::$data['categories'] = Categorie::all()->toArray();
    self::$data['product_item'] = Product::find($id)->toArray();
    return view('cms.edit_product', self::$data);
  }


  public function update(ProductsRequest $request, $id)
  {
    Product::update_item($request, $id);
    return redirect('cms/products');
  }

  public function destroy($id)
  {
    Product::destroy($id);
    Session::flash('sm', 'Product has been deleted');
    return redirect('cms/products');
  }
}
