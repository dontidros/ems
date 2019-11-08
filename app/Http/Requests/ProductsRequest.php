<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductsRequest extends FormRequest
{

  public function authorize()
  {
    return true;
  }


  public function rules(Request $request)
  {
    $ignore = !empty($request['item_id']) ? ',' . $request['item_id'] : '';
    return [
      'categorie_id' => 'required',
      'ptitle' => 'required|min:2|max:100',
      'purl' => 'required|min:2|max:100|regex:/^[a-z\d-]+$/|unique:products,purl' . $ignore,
      'price' => 'required|numeric',
      'article' => 'required|min:2',
      'pimage' => 'image|max:5242880',
    ];
  }
}
