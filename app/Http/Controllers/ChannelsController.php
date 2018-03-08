<?php

namespace App\Http\Controllers;


use Session;

use App\Channel;

use Illuminate\Http\Request;


class ChannelsController extends Controller
{
   
    public function index() {
        
        return view( 'channels.index' )->with( 'channels', Channel::all() );
    }

   
    public function create() {

        return view( 'channels.create' );
    }

   
    public function store(Request $request) {

        $this->validate( $request, [

            'name' => 'required'
        ]);


        Channel::create([

            'name' => $request->name
        ]);

        Session::flash( 'success', 'Channel created successfully' );

        return redirect()->back();
    }

   
    public function show($id) {
        
        $channel = Channel::find( $id );

        $discussions = $channel->discussions()->orderBy( 'created_at', 'desc' )->paginate(3);

        return view( 'channel' )->with( 'discussions', $discussions )->with( 'channel_name', $channel->name );
    }

    
    public function edit($id) {

        return view( 'channels.edit' )->with( 'channel', Channel::find( $id ) );
    }


    public function update(Request $request, $id) {
        
        $this->validate( $request, [

            'name' => 'required|max:255'
        ]);

        
        $channel = Channel::find( $id );

        $channel->name = $request->name;

        $channel->save();   


        Session::flash( "success", "Channel Updated Successfully !" );

        return redirect()->back();
    }

    public function destroy($id) {
        
        Channel::destroy( $id );

        Session::flash( "success", "Channel Deleted Successfully !" );

        return redirect()->back();
    }
}
