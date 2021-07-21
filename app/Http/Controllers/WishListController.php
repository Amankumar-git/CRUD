<?php

namespace App\Http\Controllers;

use App\Wishlist;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id(); 
        $wishlist = User::find($id)->wishlist;
        return view('wishlist')->with(['id' => $id, 'wishlists' => $wishlist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Wishlist $wishlist)
    {
        $id = Auth::id();
        $newwishlist = $request['newwishlist'];
        $values = array('user_id' => $id, 'wishlist_name' => $newwishlist);
        $wishlist->insert($values);
        return redirect('wishlist');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Wishlist $wishlist)
    {
        
        $newWishlist = $request['newwishlist'];
        $values = array('wishlist_name' => $newWishlist);

        // updating values in wishlists table
        $wishlist->update($values);
        return redirect('wishlist');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();       
    }
}
