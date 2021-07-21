<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){

        return redirect('wishlist');

        // // getting user id
        // $id = Auth::id(); 

        // // gettin all wishlist of current user
        // $wishlist = DB::table('wishlists')->get()->where('user_id', $id);
        // return view('wishlist')->with(['id' => $id, 'wishlists' => $wishlist]);
    }


    public function delete(Wishlist $wishlist){
        DB::table('wishlists')->where('id', $id)->delete();
        return redirect()->action('HomeController@index');
    }

    public function add(Request $request){
        // getting user id
        $id = Auth::id(); 

        // gettin new wishlist user has entered
        $wishlist = $request['newwishlist'];
        $values = array('user_id' => $id, 'wishlist_name' => $wishlist);

        //inserting new values in wishlists table
        DB::table('wishlists')->insert($values);
        return redirect()->action('HomeController@index');
    }

    public function editList(Request $request, $id){

        // gettin new wishlist user has entered
        $wishlist = $request['newwishlist'];
        $values = array('wishlist_name' => $wishlist);

        //updating new values in wishlists table
        DB::table('wishlists')->where('id', $id)->update($values);
        return redirect()->action('HomeController@index');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
