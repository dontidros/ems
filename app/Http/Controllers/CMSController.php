<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Categorie;
use App\User;


class CMSController extends MainController
{
    /**
     * 
     * gets statistics info from different models and delivering it into cms.dashboard page
     * @return  view of cms dashboard
     */
    public function dashboard()
    {
        Categorie::getCategoriesAmount(self::$data);
        Product::getProductsAmount(self::$data);
        User::getUsersAmount(self::$data);
        Order::getOrdersAmount(self::$data);
        Order::getTotalIncome(self::$data);
        //dd(self::$data);
        return view('cms.dashboard', self::$data);
    }

    public function orders()
    {
        Order::getAll(self::$data);
        //dd(self::$data);
        return view('cms.orders', self::$data);
    }
}
