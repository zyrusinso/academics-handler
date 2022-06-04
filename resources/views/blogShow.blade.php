@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="dash-assets/css/oneui.min.css">

<main id="main-container">
    <div style=" background-color: #343a40;
        width: 100%;
        padding: 50px;
        margin-bottom: 30px;">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <!-- Recent Posts -->
                <div class="card mb-4">
                    <h5 class="card-header">Recent Posts</h5>
                    <div class="list-group list-group-flush">
                        @foreach($recent as $data)
                        <a href="{{ route('home.blog', $data->id) }}" class="list-group-item">{{ $data->title }}</a>
                        @endforeach
                    </div>
                </div>
                <!-- Popular Posts -->
                @if($related->count() > 0)
                    <div class="card mb-4">
                        <h5 class="card-header">Related Post</h5>
                        <div class="list-group list-group-flush">
                            @foreach($related as $data)
                                <a href="{{ route('home.blog', $data->id) }}" class="list-group-item">{{ $data->title }}</a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-10">
                <div class="card border-primary mb-3" style="max-width: 100%;">
                    <div class="card-body mb-5">
                        <div>
                            <img src="{{ asset('storage/default/ImageDefault.png') }}" class="img-fluid mx-auto d-block"
                                alt="image">
                        </div>
                        <div class="text-center fs-sm push">
                            <h1 class="mt-3" style="font-size: 35px;">Travel the world and feel alive.</h1>
                            <span class="d-inline-block py-2 px-4 bg-body-light rounded">
                                <a class="link-effect fw-semibold"
                                    href="#">{{ $post->name }}</a>{{ substr($data->created_at, 10) }}
                            </span>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <article class="story">
                                    <p>{{ $post->detail}}</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>

                @auth
                <!-- Add Comment -->
                <div class="card border-success my-5">
                    <h5 class="card-header">Add Comment</h5>
                    <div class="card-body">
                        <form method="post" action="{{ route('blog.comment.add', $post->id) }}">
                            @csrf
                            <textarea name="comment" class="form-control"></textarea>
                            <input type="submit" class="btn btn-dark mt-2" />
                            </form>
                    </div>
                </div>
                @endauth
                <!-- Fetch Comments -->
                <div class="card border-success my-4">
                    <h5 class="card-header">Comments <span class="badge badge-dark">{{ $comments->count() }}</span></h5>
                    <div class="card-body">
                        @if($comments->count() > 0)
                            @foreach($comments as $data)
                                <blockquote class="blockquote">
                                    <p class="mb-0">{{ $data->comment }}</p>
                                    <footer class="blockquote-footer">{{ $data->name }}</footer>
                                </blockquote>
                                <hr />
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection