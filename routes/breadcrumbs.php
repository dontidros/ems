<?php

use App\Categorie;
use App\Product;
use App\Menu;

Breadcrumbs::for('home', function ($trail) {

  $trail->push('Home', route('home'));
});

Breadcrumbs::for('checkout', function ($trail) {
  $trail->parent('shop');
  $trail->push('Checkout', route('checkout'));
});

// Breadcrumbs::for('about', function ($trail) {
//   $trail->parent('home');
//   $trail->push('About', route('about'));
// });

Breadcrumbs::for('content', function ($trail, $url) {
  $menu = Menu::where('url', '=', $url)->first();
  $trail->parent('home');
  $trail->push($menu->link, route('content', [$url]));
});

Breadcrumbs::for('shop', function ($trail) {
  $trail->parent('home');
  $trail->push('Shop', route('shop'));
});

Breadcrumbs::for('signin', function ($trail) {
  $trail->parent('home');
  $trail->push('Signin', route('signin'));
});

Breadcrumbs::for('signup', function ($trail) {
  $trail->parent('home');
  $trail->push('Signup', route('signup'));
});

Breadcrumbs::for('products', function ($trail, $curl) {
  $categorie = Categorie::where('url', '=', $curl)->first();
  $trail->parent('shop');
  $trail->push($categorie->title, route('products', [$curl]));
});

Breadcrumbs::for('item', function ($trail, $curl, $purl) {
  $product = Product::where('purl', '=', $purl)->first();
  $trail->parent('products', $curl);
  $trail->push($product->ptitle, route('item', [$curl, $purl]));
});
