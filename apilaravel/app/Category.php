<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name','description'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function wasCreatedBy($user)
    {
        if( is_null($user) ) {
            return false;
        }
        return $this->user_id === $user->id; 
    } 
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
