@extends('layouts.app');

@section('content')
        <a href="/posts" class="btn btn-info">Go Back</a>
        <hr>
        <div class="card">
                <div class="card-body">
                <h1 class="card-title">{{$post->title}}</h1>
                        <img style="width: 100%" src="/storage/cover_images/{{$post->coverImage}}"><br><br>
                <div class="card-text">
                    {!!$post->body!!}
                </div>
                <hr>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                <hr>
                @if(!Auth::guest())
                        @if(Auth::user()->id == $post->user_id)
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-success"> Edit</a>

                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=> 'POST', 'class' => 'float-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger pull-right'])}}
                                {!!Form::close()!!}
                        @endif
                @endif
                </div>
        </div>
@endsection