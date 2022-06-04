@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Post
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->

<link rel="stylesheet" href="dash-assets/css/oneui.min.css">

<!-- Page Content -->
<div class="content">
    <div class="block block-rounded overflow-hidden">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">
            <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link active" id="search-projects-tab"><i
                        class="fa fa-step-backward"></i></a>
            </li>
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">Post</button>
            </li>
        </ul>

        <div class="col-lg-4">
            <p class="font-size-sm text-muted ml-5">
            </p>
        </div>
        <div class="block block-rounded mb-0">
            <div class="block-header mt-4 content">
                <h3 class="block-title">Edit Post</h3>
            </div>
            <div class="block-content tab-content overflow-hidden">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="font-size-sm text-muted ml-5">
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">

                        <!-- Form Labels on top - Default Style -->
                        <form class="mb-5" action="<?= route('post.update', $post->id); ?>" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                        <div><label for="example-select">Category</label></div>
                        
                        <select class="form-select" id="example-select" name="cat_id">
                            @foreach($category as $data)
                                <?php 
                                    echo '<option class="dropdown-item" value="'.$data->id.'"'.(($post->id == $data->id) ? "selected" : ""). '>'.$data->cat_title.'</option>';
                                ?>
                            @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="example-text-input" name="title" placeholder="Title" value="{{ (old('title'))? old('title') : $post->title }}"
                                autocomplete="title" autofocus>
    
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-file-input-custom">Thumbnail</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('thumb') is-invalid @enderror"
                                    data-toggle="custom-file-input" id="example-file-input-custom" name="thumb">
                                <label class="custom-file-label" for="example-file-input-custom">Choose
                                    Image</label>
                            </div>
                            @error('thumb')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-file-input-custom">Full Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('full_img') is-invalid @enderror"
                                    data-toggle="custom-file-input" id="example-file-input-custom" name="full_img">
                                <label class="custom-file-label" for="example-file-input-custom">Choose
                                    Image</label>
                            </div>
                            @error('full_img')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Detail</label>
                            <textarea rows="10" cols="10" type="text" class="form-control @error('detail') is-invalid @enderror"
                            id="example-text-input" name="detail" placeholder="Detail">{{(old('detail'))? old('detail') : $post->detail}}</textarea>
                            @error('detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">Tags</label>
                            <input type="text" class="form-control @error('tags') is-invalid @enderror"
                                id="example-text-input" name="tags" placeholder="Tags" value="{{ (old('tags'))? old('tags') : $post->tags }}">

                            @error('tags')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="profile_submit">Save</button>
                        </div>
                    </form>
                        <!-- END Form Labels on top - Default Style -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection