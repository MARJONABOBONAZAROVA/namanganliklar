<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class GetInfoController extends Controller
{
    public function get_posts(){
        $posts = PostResource::collection(Post::all());
        return response(['succes' =>True,'data'=>$posts]);
    }

    public function get_post($id){
        $post = Post::find($id);
        return $post;
    }

    public function get_categories(){
        $categories = Category::all();
        return $categories;
    }

    public function get_category($id){
        $category = Category::find($id);
        return $category;
    }


}
