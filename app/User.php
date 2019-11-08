<?php

namespace App;

use Session;
use DB;
use Hash;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public static function validateUser($email, $password)
    {
        $valid = false;
        //this is the query for email exists validate
        //(first method will return us null or object)
        $user = DB::table('users AS u')
            ->join('users_roles AS ur', 'u.id', '=', 'ur.uid')
            ->where('u.email', '=', $email)
            ->first();
        //if $user is not null and the password from form equals the
        // crypted password it means that the user is in the database
        if ($user && Hash::check($password, $user->password)) {
            $valid = true;
            Session::put('user_id', $user->id);
            Session::put('user_name', $user->name);
            if ($user->rid == 6) {
                Session::put('is_admin', true);
            }
            Session::flash('sm', 'welcome back ' . $user->name);
        }

        return $valid;
    }

    public static function save_new($request)
    {
        $user = new self();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);

        //save() - adds $user into users table
        $user->save();
        //id() - gets $user id from the database 
        $uid = $user->id;

        //add a new record on users_roles
        DB::insert("INSERT INTO users_roles VALUES ($uid, 7)");

        //connecting the new user to system after singning up successfully
        Session::put('user_id', $uid);
        //Shlomi says it's better to use $request['name'] instead of $user->name (I don't know why) 
        Session::put('user_name', $request['name']);
        Session::flash('sm', 'You signup successfully. welcome ' . $request['name']);
    }

    /**
     * gets users amount
     * @param array - main controller's $data array delivered by reference
     */
    public static function getUsersAmount(&$data)
    {
        $data['users_amount'] = DB::select('SELECT COUNT(*) AS c FROM users');
    }
}
