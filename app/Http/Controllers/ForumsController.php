<?php

namespace App\Http\Controllers;

use App\Discussion;

use Illuminate\Http\Request;


class ForumsController extends Controller
{

    public function index() {

        $discussions = Discussion::orderBy( 'created_at', 'desc' )->paginate(3);
        
        return view( 'forum', [ 'discussions'=> $discussions ] );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
}
