<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart, Session, DB;

class Order extends Model
{
    public static function save_new()
    {
        $order =  new self();
        $order->user_id = Session::get('user_id');
        //serialize function turns array to string (in order to save the data on the database) and makes it easy to turn the string back to array (with the unserialize function)
        $order->data = serialize(Cart::getContent()->toArray());
        $order->total = Cart::getTotal();
        //save the order on the database
        $order->save();
        //clear the cart after the order process completed
        Cart::clear();
        //message for user that the order has saved  
        Session::flash('sm', 'Thanks, your order saved');
    }

    public static function getAll(&$data)
    {   #this query gets the user created_at instead of order created_at
        // $data['orders'] = DB::table('orders AS o')
        //     ->join('users AS u', 'u.id', '=', 'o.user_id')
        //     ->orderBy('o.created_at', 'desc')
        //     ->get();

        #this query works!
        $data['orders'] = DB::select("SELECT u.name, o.total, o.data, o.created_at 
                                      FROM orders AS o JOIN users AS u ON u.id=o.user_id
                                      ORDER BY o.created_at DESC");
    }

    /**
     * gets orders amount
     * @param array - main controller's $data array delivered by reference
     */
    public static function getOrdersAmount(&$data)
    {
        $data['orders_amount'] = DB::select("SELECT COUNT(*) AS c FROM orders");
    }


    /**
     * calculate total income
     * @param array - main controller's $data array delivered by reference
     */
    public static function getTotalIncome(&$data)
    {
        $data['total_income'] = DB::select("SELECT SUM(total) AS sum FROM orders");
    }
}
