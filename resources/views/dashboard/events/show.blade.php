@extends('layouts.dash')

@section('content')

<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Event
            </h1>
        </div>
    </div>
</div>
<!-- END Hero -->
<!-- Labels on top -->
<div class="block block-rounded mb-0">
    <div class="block-header mt-4 content">
        <a href="{{ route('event.index') }}" class="nav-link active mr-3" id="search-projects-tab"><i
                class="fa fa-step-backward"></i></a>
        <h3 class="block-title">Update Event</h3>
    </div>
    <div class="block-content block-content-full">
        <div class="row">
            <div class="col-lg-4">
                <p class="font-size-sm text-muted ml-5">
                </p>
            </div>
            <div class="col-lg-8 col-xl-5">

                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif

                <!-- Form Labels on top - Default Style -->
                <form class="mb-5" action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="example-text-input">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                            id="example-text-input" name="title" placeholder="Title" value="{{ (old('title'))? old('title') : $event->title }}">

                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Date</label>
                        <input type="text" class="form-control @error('date') is-invalid @enderror"
                            id="example-text-input" name="date" placeholder="ex: July 8, 2000"
                            value="{{ (old('date'))? old('date') : $event->date }}">

                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Start Time</label>
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                            id="example-text-input" name="start_time" placeholder="Start Time"
                            value="{{ (old('start_time'))? old('start_time') : $event->start_time }}">

                        @error('start_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">End Time</label>
                        <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                            id="example-text-input" name="end_time" placeholder="End Time"
                            value="{{ (old('end_time'))? old('end_time') : $event->end_time }}">

                        @error('end_time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="example-text-input">Location</label>
                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                            id="example-text-input" name="location" placeholder="Location"
                            value="{{ (old('location'))? old('location') : $event->location }}">

                        @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="example-file-input-custom">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror"
                                data-toggle="custom-file-input" id="example-file-input-custom" name="image">
                            <label class="custom-file-label" for="example-file-input-custom">Choose
                                Image</label>
                        </div>
                        @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                <!-- END Form Labels on top - Default Style -->
            </div>
        </div>
    </div>
</div>
<!-- END Labels on top -->


@endsection