<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Menu;
use App\Content;

class PagesController extends MainController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function home()
  {

    self::$data['title'] = 'Home Page';

    return view('contents.home', self::$data);
  }


  // public function about()
  // {
  //   self::$data['title'] = 'About Page';
  //   return view('contents.about', self::$data);
  // }

  public function content($url)
  {

    Content::getAll($url, self::$data);
    self::$data['contents'] = self::$data['contents']->toArray();
    return view('contents.content', self::$data);
  }
}
