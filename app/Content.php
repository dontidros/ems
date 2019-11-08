<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model
{
    public static function getAll($url, &$data)
    {
        if ($menu = Menu::where('url', '=', $url)->first()) {
            $data['contents'] = Menu::find($menu->id)->contents;
            $data['title'] = $menu->title;
            $data['url'] = $url;
        } else {
            abort('404');
        }
    }

    public static function save_new($request)
    {
        $content = new self();
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['ctitle'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'New content added successfully');
    }

    public static function update_item($request, $id)
    {
        $content = self::find($id);
        $content->menu_id = $request['menu_id'];
        $content->ctitle = $request['ctitle'];
        $content->article = $request['article'];
        $content->save();
        Session::flash('sm', 'Content updated successfully');
    }
}
