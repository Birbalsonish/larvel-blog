<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Photo;
use App\Models\photos;
use Illuminate\Http\Request;

class Photocontroller extends Controller
{
    function createphoto(Request $request){
        $incomingdata = $request->validate([
           'title'=>'required',
            'image'=>'required|image'
        ]);
        $imagepath = $request->file('image')->store('photos','public');
   $incomingdata['image_path'] = $imagepath;
   $incomingdata['user_id'] = auth()->id();
        Photo::create($incomingdata);
        return redirect('/');
    }



    function commentpage(Request $request){
        $incomingdata = $request->validate([
           'comment'=>'required'
        ]);
        Page::create($incomingdata);
        return redirect('/');
    }
        // $imagepath = $request->file('image')->store('photos','public');
}
