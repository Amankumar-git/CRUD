<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $table = 'wishlists';

    protected $fillable = [
        'wishlist_name', 
    ];


    public function user() {

    return $this->belongsTo('App\User', 'user_id', 'id');

    }
}
