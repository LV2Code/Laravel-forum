<?php

namespace App;


use Auth;

use Illuminate\Database\Eloquent\Model;


class Discussion extends Model
{
 
    protected $fillable = [ 'title', 'content', 'user_id', 'channel_id' ];


    public function user() {
        
        return $this->belongsTo( 'App\User' );
    }
    

    public function channel() {
        
        return $this->belongsTo( 'App\Channel' );
    }

    public function replies() {
        
        return $this->hasMany( 'App\Reply' );
    }
    
    public function watchers() {

        return $this->hasMany( 'App\Watcher' );
    }


    public function is_being_watched_by_current_user( $id ) {

        $watch_status =  \App\Watcher::where( 'user_id', Auth::id() )
                                        ->where( 'discussion_id', $id )
                                        ->exists();

        // dd( $id, Auth::id(), $watch_status );

        return $watch_status;
    }
}
