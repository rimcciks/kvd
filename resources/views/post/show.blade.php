@extends('layout.app')
@section('link_text', 'Go to All Posts')
@section('link', '/post')

@section('content')

<div class="row my-4">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow">
      <img src="{{ asset('storage/images/'.$post->image) }}" 
      class="img-fluid card-img-top">
      <div class="card-body p-5">
        <div class="d-flex justify-content-between align-items-center">
          <p class="btn btn-dark rounded-pill">{{ $post->category }}</p>
          <p class="lead">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
        </div>

        <hr>
        <h3 class="fw-bold text-primary">{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
      </div>
      <div class="card-footer px-5 py-3 d-flex justify-content-end">
      <?php
        if(Session::has('loginID'))
        {
          if($post->user_id == $post['data']->id)
          {?>
          <a href="/post/{{$post->id}}/edit" class="btn btn-success rounded-pill me-2">Edit</a>
          <?php 
        }
        } ?>
        <form action="/post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')
          <?php
        if(Session::has('loginID'))
        {
          if($post->user_id == $post['data']->id)
          {?>
          <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
          <?php 
        }
        } ?>
          
        </form>
      </div>
      
    </div>
    <div class="comment-area mt-4">
      @if (session('message'))
          <h6 class="alert alert-warning mb-3">{{session('message')}}</h6>
      @endif
        <div class="card card-body">
          <h6>Leave a comment</h6>
          <form action="{{ url('comments') }}" method="POST">
            @csrf
            <input type="hidden" name="post_slug" value="{{$post->slug}}">
            <textarea name="comment_body" class="form-control" rows="3" ></textarea>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
        
        @forelse($post->comments as $comment)

        <div class="comment-container card card-body shadow-sm mt-3">
          <div class="detail_area">
            <h6 class="user-name mb-1">
               @if ($comment->user) 
                {{$comment->user->name}} {{$comment->user->surname}}
                @endif
              <small class="ms-3 text-primary">Commented on: {{$comment->created_at->format('d-m-y')}}</small>
            </h6>
            <p class="user-comment mb-1">
              {!! $comment->comment_body !!}
          </p>
          </div>
          <div>
          <?php
          if(Session::has('loginID'))
          {
            if($comment->user_id == $post['data']->id)
            {?>
            <button type="button" value="{{ $comment->id }}" class="deleteComment btn btn-danger rounded-pill me-2">Delete</button>
          <?php 
        }
        } ?>
            
          </div>
        </div>
        @empty
        <div class="card card-body shadow-sm mt-3">
          <h6>No comments yet. </h6>
        </div>
        @endforelse
        
      </div>
  </div>
</div>
@endsection
@section('scripts')
            <script>
              $(document).ready(function() 
              {

                $.ajaxSetup(
                  {
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
                });

                $(document).on('click', '.deleteComment', function() 
                {
                  if(confirm('Are you sure you want to delete this comment?'))
                  {
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();

                    $.ajax({
                      type: "POST",
                      url: "/delete-comment",
                      data: {
                        'comment_id': comment_id
                      },
                      success: function (res)
                      {
                        if(res.status == 200)
                        {
                          thisClicked.closest('.comment-container').remove();
                          alert(res.message);
                        }
                        else
                        {
                          alert(res.message);
                        }
                      }
                    });
                  }
                });
              });
            </script>
@endsection