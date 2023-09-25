<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    /* public function welcome(){
        return view('welcome',compact('sections'));
  } */


    public function welcome(){
        /* $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
        $currency = $response->json();
        $arr['usd'] = $currency['0']['Rate'];
        $arr['eur'] = $currency['1']['Rate'];
        $arr['rubl'] = $currency['2']['Rate'];
        return $arr; */

        $posts = Post::latest()->take(6)->get();
        return view('welcome',compact('posts'));
    }


    public function get_article($id){
        $post = Post::find($id);
       /*  $posts->increment('views'); */
        $posts = Post::where('category_id', $post->category_id)->take(3)->get();


        return view('pages.article', compact('post', 'posts'));
    }


    public function get_contact(){

        return view('pages.contact');
    }


    public function get_list($id){
        $posts = Post::where('category_id', $id)->paginate(10);
        return view('pages.list', compact('posts'));
    }

    public function post_message(Request $request){
       DB::table('applies')->insert([
        'full_name' => $request->full_name,
        'phone' => $request->phone,
        'message' => $request->message,
        'status' => 0,

       ]);
       return back();

    }

    public function get_search(Request $request){
        $key = $request->key;
        $posts = Post::where('title_uz','like','%' .$key. '%')
                 ->orwhere('title_ru','like','%' .$key. '%')
                 ->orwhere('body_uz','like','%' .$key. '%')
                 ->orwhere('body_ru','like','%' .$key. '%')
                 ->orderBy('id', 'DESC')->paginate(8);

        return view('pages.search',compact('posts'));
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
