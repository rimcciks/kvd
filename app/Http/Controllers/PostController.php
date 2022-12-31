<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return IlluminateHttpResponse
   */
  public function index() {
    $posts = Post::orderBy('id', 'desc')->paginate(3);
    return view('post.index', ['posts' => $posts]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return IlluminateHttpResponse
   */
  public function create() {
    return view('post.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @return IlluminateHttpResponse
   */
  public function store(Request $request) {
    $data = array();
    if(Session::has('loginID')){
        $data = User::where('id', '=', Session::get('loginID'))->first();
        
        //print_r($results);
        //echo "{{$data->id}}";
        //print_r($results[0]->name);
        //print_r($data);
        
    }
    $request->validate([
      'title' => 'required',
      'category' => 'required',
      'content' => 'required|min:5',
      'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $imageName = time() . '.' . $request->file->extension();
    // $request->image->move(public_path('images'), $imageName);
    $request->file->storeAs('public/images', $imageName);

    $postData = ['title' => $request->title, 'category' => $request->category, 'content' => $request->content, 'image' => $imageName, 'user_id' => $data->id];

    Post::create($postData);
    //print_r($postData);
    return redirect('/post')->with(['message' => 'Post added successfully!', 'status' => 'success']);
  }

  /**
   * Display the specified resource.
   *
   * @param  AppModelsPost  $post
   * @return IlluminateHttpResponse
   */
  public function show(Post $post) {
    /*$data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();
            $s =  "select u.id from users u left join posts p on u.id = p.user_id where u.id =" . $data->id;
            $results = \DB::select( $s );
            //$this->getCities();
            //$this->getCountries();
            //$user_id=$data[id];
            print_r($results);
            //print_r($results[0]->name);
            //print_r($data);
            
        }
        /*if($results[0]->id == $results[1]->id){
          echo "test";
          return view('post.edit', ['post' => $post]);
        }else{
          echo "nav vienāds";
        }*/
        $post['data']=$this->showbutton();
        echo $post;
    return view('post.show', ['post' => $post, ]);
  }
  public function showbutton() {
    $data = array();
        if(Session::has('loginID')){
            $data = User::where('id', '=', Session::get('loginID'))->first();
            //$s =  "select u.id from users u left join posts p on u.id = p.user_id where u.id =" . $data->id;
            //$results = \DB::select( $s );
            //$this->getCities();
            //$this->getCountries();
            //$user_id=$data[id];
            //print_r($results);
            //print_r($results[0]->name);
            //print_r($data);
            
        }
        /*if($results[0]->id == $results[1]->id){
          echo "test";
          return view('post.edit', ['post' => $post]);
        }else{
          echo "nav vienāds";
        }*/
    return $data;
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  AppModelsPost  $post
   * @return IlluminateHttpResponse
   */
  public function edit(Post $post) {
    
        return view('post.edit', ['post' => $post]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  IlluminateHttpRequest  $request
   * @param  AppModelsPost  $post
   * @return IlluminateHttpResponse
   */
  public function update(Request $request, Post $post) {
    $imageName = '';
    if ($request->hasFile('file')) {
      $imageName = time() . '.' . $request->file->extension();
      $request->file->storeAs('public/images', $imageName);
      if ($post->image) {
        Storage::delete('public/images/' . $post->image);
      }
    } else {
      $imageName = $post->image;
    }

    $postData = ['title' => $request->title, 'category' => $request->category, 'content' => $request->content, 'image' => $imageName];

    $post->update($postData);
    return redirect('/post')->with(['message' => 'Post updated successfully!', 'status' => 'success']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  AppModelsPost  $post
   * @return IlluminateHttpResponse
   */
  public function destroy(Post $post) {
    Storage::delete('public/images/' . $post->image);
    $post->delete();
    return redirect('/post')->with(['message' => 'Post deleted successfully!', 'status' => 'info']);
  }

  
}