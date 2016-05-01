@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h1>{{ $album->title }}</h1>
                    <ul>

                      <?php $i = 0; ?>

                      @foreach ($album->likes as $like)

                        <?php $i++ ?>

                      @endforeach

                      {{ $i }} Likes


                      @foreach ($album->comments as $comment)

                        <li>

                          {{ $comment->comment }} <a href="/profile/{{ $comment->user_id }}"> By: {{ $comment->user->username }}</a>

                          @if($comment->user_id == Auth::id())

                            <a href="/comments/{{ $comment->id }}/edit">Edit</a>

                            <form method="POST" action="/comments/{{ $comment->id }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit">Delete</button>
                            </form>

                          @endif

                        </li>

                      @endforeach

                      <form method="POST" action="/albums/{{ $album->id }}/likes">
                          {{ csrf_field() }}
                          <button type="submit">Like</button>
                      </form>

                      @if ($album->user_id == Auth::id())

                      <h1>Edit Album</h1>

                      <form method="POST" action="/albums/{{ $album->id }}">

                          {{ method_field('PATCH')}}
                          {{ csrf_field() }}
                          <textarea name = "title">{{ $album->title }}</textarea>
                          <button type="submit">Update</button>
                      </form>

                      @endif

                      <h3>Add a new Comment</h3>

                      <form method="POST" action="/albums/{{ $album->id }}/comments">
                          {{ csrf_field() }}
                          <textarea name = "comment"></textarea>
                          <button type="submit">Create Comment</button>
                      </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection