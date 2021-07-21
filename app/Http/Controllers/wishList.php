<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class wishList extends Controller
{
    public function getWishList(){

        return view('wishlist');
    }
}
