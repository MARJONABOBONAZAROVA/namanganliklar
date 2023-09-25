<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Models\Post;


class PostController extends Controller
{
    protected $postService;
    public  function __construct(PostService $postService)
    {

        /* $this->middleware(['permission:create category'])->only(['create','store']);
        $this->middleware(['permission:edit category'])->only(['edit','update']);
        $this->middleware(['permission:delete category'])->only(['destroy']);  */
        $this->postService = new PostService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $posts = $this->postService->getPost();
        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->postService->getCategory();
        $tags = $this->postService->getTag();
        return view('admin.posts.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->postService->store($request);

        return redirect()->route('admin.posts.index')->with('succes', 'Muvaffaqiyatli qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $categories = $this->postService->getCategory();
        $post = $this->postService->getShow($post);
        return view('admin.posts.show', compact('categories', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $post)
    {
        $categories = $this->postService->getCategory();
        $tags = $this->postService->getTag();
        return view('admin.posts.update', compact('categories', 'posts','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {
        $this->postService->update($request,$post);

        return redirect()->route('admin.posts.index')->with('succes', 'Muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->postService->delete($post);
        return redirect()->route('admin.posts.index')->with('succes', 'Muvaffaqiyatli o`chirildi!');

    }


}
