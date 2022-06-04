@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="dash-assets/css/oneui.min.css">

<div style=" background-color: #343a40;
  width: 100%;
  padding: 50px;
  margin-bottom: 30px;">
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <div class="card mb-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <form action="{{ route('blog.search') }}" method="post">
                        @csrf
                        <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search Post" />
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="submit" id="button-addon2">Search</button>
                        </div>
                        </div>
                    </form>
                </div>
                   
            </div>
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
            @if($categories->count() > 0)
            <div class="card mb-4">
                <h5 class="card-header">Category List</h5>
                <div class="list-group list-group-flush">
                    @foreach($categories as $data)
                        <a href="{{ route('blog.category', $data->id) }}" class="list-group-item">{{ $data->cat_title }}</a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-8">
            <div class="content content-boxed">
                <div class="row">
                    @foreach($posts as $data)
                    <div class="col-lg-4">
                        <a class="block block-rounded block-link-pop overflow-hidden" href="be_pages_blog_story.html">
                            <a href="{{ route('home.blog', $data->id) }}">
                                <img src="{{ asset('storage').'/'.$data->thumb}}" class="img-fluid"
                                    alt="{{ $data->title }}" />
                            </a>
                            <div class="block-content">
                                <a href="{{ route('home.blog', $data->id) }}">

                                    <h1 class="mb-1">{{ $data->title }}
                                    </h1>
                                </a>
                                <p class="fs-sm fw-medium mb-2">
                                    <span class="text-primary">{{ $data->name }}</span>
                                    {{ substr($data->created_at, 10) }}
                                </p>
                                <p class="fs-sm text-muted">
                                    {{ Str::limit($data->detail, 30) }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="my-2">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $posts->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>


@endsection