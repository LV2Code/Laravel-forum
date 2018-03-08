<?php

namespace App\Http\Controllers;


use Auth;

use Session;

use App\Like;

use App\Reply;

use Illuminate\Http\Request;

class RepliesController extends Controller
{
 
    public function like( $id ) {

        Like::create([

            'reply_id' => $id,

            'user_id' => Auth::id(),
        ]);


        Session::flash( 'success', 'Reply liked successfully !' );

        return redirect()->back();
    }


    public function unlike( $id ) {
        
        $like = Like::where( 'reply_id', $id )->where( 'user_id', Auth::id() )->first();

        $like->delete();


        Session::flash( 'success', 'Reply removed successfully !' );

        return redirect()->back();
    }


    public function correct_answer( $id ) {
        
        $reply = Reply::find( $id );

        $reply->correct_answer = 1;

        $reply->save();


        Session::flash( 'success', 'Reply marked as correct !' );

        return redirect()->back();
    }
}
