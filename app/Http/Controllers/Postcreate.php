<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class Postcreate extends Controller
{
    function createpost(Request $request){
        $incomingdata = $request->validate([
           'title'=>'required',
            'body'=>'required'
        ]);
        $incomingdata['user_id'] = auth()->id();
        Post::create($incomingdata);
        return redirect('/');
    }
}
