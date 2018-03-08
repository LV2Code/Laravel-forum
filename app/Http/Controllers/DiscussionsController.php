<?php

namespace App\Http\Controllers;

use Auth;

use Session;

use App\Reply;

use Notification;

use App\Discussion;

use Illuminate\Http\Request;


class DiscussionsController extends Controller
{
  
    public function index()
    {
        //
    }


    public function create() {
        
        return view( 'discussions.create' );
    }


    public function store(Request $request) {
        
        $this->validate( $request, [

            'channel_id' => 'required',
            
            'title' => 'required|max:255',

            'content' => 'required',
        ]);


        $discussion = Discussion::create([

            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel_id,
            'user_id' => Auth::id(),
        ]);

        Session::flash( 'success', 'Discussion created successfully !' );

        return redirect()->route( 'discussions.show', [ 'id' => $discussion->id ] );
    }


    public function reply($id) {

        $discussion = Discussion::find( $id );

        $reply = Reply::create([

            'user_id' => Auth::id(),

            'discussion_id' => $id,

            'content' => request()->reply
        ]);


        $watchers = [];


        foreach ($discussion->watchers as $watcher ) :
            
            array_push( $watchers, \App\User::find( $watcher->user_id ) );
        
        endforeach;


        Notification::send( $watchers, new \App\Notifications\NewReplyAdded( $discussion ) );


        Session::flash( 'success', 'Replied to discussion successfully !' );

        return redirect()->back();
    }

   
    public function show($id) {

        $discussion = Discussion::find( $id );

        $correct_answer = $discussion->replies()->where( 'correct_answer', 1 )->first();

        return view( 'discussions.show' )->with( 'discussion', $discussion )
                                         ->with( 'correct_answer', $correct_answer );

        // dd( $discussion );
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }


    public function answered() {

        $discussions = Discussion::with('replies')->whereHas('replies', function($query){
                                    
                                        $query->where('correct_answer','=', 1);
                                    
                                    })->paginate(10);
        
        return view( 'discussions', [ 'discussions'=> $discussions, 'answered' => 1 ] );
    }


    public function unanswered() {
        

        $discussions = Discussion::with('replies')->whereHas('replies', function($query){
                                    
                                        $query->where('correct_answer','=', 1);
                                    
                                    })->paginate(10);
        
        return view( 'discussions', [ 'discussions'=> $discussions, 'answered' => 0 ] );
    }


    public function user($id) {
        

        // $discussions = Discussion::where( function( $query ) use ($id) {

        //     $query->where('user_id','=', $id);
        // } );

        // orderBy( 'created_at', 'desc' )->where( 'user_id', $id );
        
        // dd( $discussions );


        // return view( 'discussions', [ 'discussions'=> $discussions, 'answered' => 0 ] );
    }    
}
