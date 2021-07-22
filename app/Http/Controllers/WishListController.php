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
        $wishlist = Auth::user()->wishlists;
        return view('wishlist')->with(['wishlists' => $wishlist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Wishlist $wishlist) {
        // used to display form
        return view('newWishList');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Wishlist $wishlist) {
        // used to add new data to database

        $validatedData = $request->validate([
            'newWish' => ['required', 'max:255'],
           
        ]);

        $newWish = $request['newWish'];
        $values = array('user_id' => Auth::id(), 'wishlist_name' => $newWish);
        $wishlist->insert($values);
        return redirect('/wishlist');  
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
    public function edit(Request $request, Wishlist $wishlist) {
        // used to show edit form
        $text = $request['text'];
        return view('editWishList')->with(['id' => $wishlist->id, 'text' => $text]);

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
        // used to update existing data
        $validatedData = $request->validate([
            
            'updateWish' => 'required|max:255',
        ]);
        $updateWish = $request['updateWish'];
        $values = array('wishlist_name' => $updateWish);
        // updating values in wishlists table
        $wishlist->update($values);
        return redirect('wishlist');
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
