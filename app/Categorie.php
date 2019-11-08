<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Session;
use DB;

class Categorie extends Model
{
    public static function getCategories(&$data)
    {
        $categories = self::all()->toArray();
        $data['categories'] = $categories;
    }

    public static function save_new($request)
    {
        $image_name = 'image_not_available.png';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/', $image_name);
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }

        $category = new self();
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->url = $request['url'];
        $category->image = $image_name;
        $category->save();
        Session::flash('sm', 'Category created successfully');
    }

    public static function update_item($request, $id)
    {
        $image_name = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = date('Y.m.d.H.i.s') . '-' . $file->getClientOriginalName();
            $request->file('image')->move(public_path() . '/images/', $image_name);
            $img = Image::make(public_path() . '/images/' . $image_name);
            $img->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }

        $category = self::find($id);
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->url = $request['url'];
        if ($image_name) {
            $category->image = $image_name;
        }
        $category->save();
        Session::flash('sm', 'Category updated successfully');
    }

    /**
     * gets categories amount
     * @param array - main controller's $data array delivered by reference
     */
    public static function getCategoriesAmount(&$data)
    {
        $data['categories_amount'] = DB::select('SELECT COUNT(*) AS c FROM categories');
    }
}
