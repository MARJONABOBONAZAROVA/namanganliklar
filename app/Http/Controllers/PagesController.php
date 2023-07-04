<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{
    /* public function welcome(){
        return view('welcome',compact('sections'));
  } */


    public function adds(){
        return view('pages.adds');
    }


    public function app(){
        return view('pages.app');
    }


    public function second(){
        return view('pages.second');
    }


    public function layer(){
        return view('pages.layer');
    }


    public function news(){
        return view('pages.news');
    }

    public function posts(){
        return view('pages.posts');
    }
    public function footer(){
        return view('pages.footer');
    }

    /* public function  store(Request $request){
        DB::table('orders')->insert([

        'name' => $request->name,
        'phone' => $request->phone,
        'group' => $request->group

        ]);

        return back();


    } */
}
