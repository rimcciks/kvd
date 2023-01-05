<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Post;
use Session;

class CommentController extends Controller
{
    public function store(Request $request){
        $data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string'
            ]);
            if($validator->fails()){
                return  redirect()->back()->with('message', 'Comment message is mandatory');
            }
            $post = Post::where('slug', $request->post_slug)->first();
            if($post){
                Comment::create([
                    'post_id' => $post->id,
                    'user_id' => $data->id,
                    'comment_body' => $request->comment_body
                ]);
                return redirect()->back()->with('message', 'Comment added successfully');
            }else{
                return redirect()->back()->with('message', 'No such post found');
            }
        }else{
            return redirect('login')->with('message', 'You have to log in first');
        }
    }

    public function destroy(Request $request){
        $data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();

            $comment = Comment::where('id', $request->comment_id)->where('user_id', $data->id )->first();
            if($comment){
            $comment->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Comment deleted successfully'
            ]);
            }else{
                return response()->json([
                    'status' => 500,
                    'message' => 'Something is wrong'
                ]); 
            }
        }else{
            return response()->json([
                'status' => 401,
                'message' => 'Login to delete this comment'
            ]);
        }
    }

  
}
