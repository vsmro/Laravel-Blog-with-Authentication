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
        <div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

var disqus_config = function () {
this.page.url = '{{Request::url()}}';  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = {{$post->id}}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://lsapp-test.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
@endsection