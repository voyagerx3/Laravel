<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title','content','url','category_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }
    public function wasCreatedBy($user)
    {
        if( is_null($user) ) {
            return false;
        }
        return $this->user_id === $user->id; 
    }    
}
