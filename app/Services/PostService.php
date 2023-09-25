<?php
namespace App\Services;
use App\Events\AuditEvent;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;



class postService
{
    public function getPost(){
        $posts  = Post::paginate(10);
        return $posts;
    }

    public function getCategory()
    {
        return Category::all();

    }

    public function getTag()
    {
        return Tag::all();

    }

    public function getShow(Post $post)
    {
        return $post;

    }


    public function store(Request $request)
    {
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            $requestData['img'] = $this->img_upload();
        }
       $post = Post::create($requestData);
       $post->tags()->attach($request->tag_id);
       $user = 'gggg';
       event(new AuditEvent($user, 'Post qo`shildi', json_encode($request)));
    }

    public function update( $request,Post $post){
        $requestData = $request->all();

        if ($request->hasFile('img'))
        {
            if(isset($post->img) && file_exists(public_path('/files/'.$post->img))){
                unlink(public_path('/files/'.$post->img));
            }
            $requestData['img'] = $this->img_upload();
        }
        $post->update($requestData);
        $post->tags()->sync($request->tag_id);

        $user = auth()->user()->name;
        event(new AuditEvent($user, 'Post yangilandi', json_encode($request)));

    }

    public function delete(Post $post){
        if(isset($post->img) && file_exists(public_path('/files/'.$post->img))){
            unlink(public_path('/files/'.$post->img));
        }
        $user = 'gggg';
        event(new AuditEvent($user, 'Post o`chirildi', json_encode($post)));

        $post->tags()->detach();

        $post->delete();
    }

    public function img_upload(){
        $file = request()->file('img');
        $fileName = time().'-'.$file->getClientOriginalName();
        $file->move('files/', $fileName);
        return $fileName;

    }
}
?>
