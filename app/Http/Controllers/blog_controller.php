<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Answer;

class blog_controller extends Controller
{
    public function index() {
        $users = User::All();
        return view('panel', ['users' => $users]);
    }

    public function create_user(Request $request) {
        //BEGIN
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        if($user){
            return 1;
        }else{
            return 0;
        }
        //END
    }

    public function create_post_with_id(Request $request) {
        //BEGIN
        $post = new Post();

        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user_id;

        $post->save();

        if($post){
            return 1;
        }else{
            return 0;
        }
        //END
    }

    public function create_answer_with_id(Request $request) {
        //BEGIN
        $answer = new Answer();

        $answer->content = $request->content;
        $answer->user_id = $request->user_id;
        $answer->post_id = $request->post_id;

        $answer->save();

        if($answer){
            return 1;
        }else{
            return 0;
        }
        //END
    }

    public function blog() {
        //BEGIN
        $post_list = Post::All();
        return view('blog.blog', ['post_list' => $post_list]);
        //END
    }

    public function post_info($id) {
        //BEGIN
        $post = Post::with('answers')->where('id', '=', $id)->first();
        $user = User::find($post->user_id);
        return view('blog.post', ['post' => $post, 'user' => $user]);
        //END
    }
}
