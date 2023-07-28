<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ChatController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index($id = null){
        if($id!=null){
            $profile = User::findOrFail($id);
        }else{
            $profile = (object)array("id"=>null,"name"=>null,"email"=>null);
        }
        return view('chat.index',compact('id','profile'));
    }
}
