<?php

namespace App;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    
    protected $fillable = [ 'content', 'user_id', 'discussion_id', 'best_answer' ];


    public function user() {
        
        return $this->belongsTo( 'App\User' );        
    }    

    public function discussion() {
        
        return $this->belongsTo( 'App\Discussion' );        
    }    

    public function likes() {
        
        return $this->hasMany( 'App\Like' );        
    }    


    public function is_liked_by_current_user( $reply_id ) {

        $id = Auth::id();

        $liked_status =  \App\Like::where( 'user_id', Auth::id() )->where( 'reply_id', $reply_id )->exists();

        return $liked_status;
    }

}
