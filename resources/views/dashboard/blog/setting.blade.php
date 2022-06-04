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
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">

                @if(Session::has('success'))
                   <p class="text-success">{{ session('success') }}</p>
                @endif
                <form action="{{ route('blog.settings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <table class="table table-striped table-vcenter">
                        <tbody>
                            <tr>
                                <th>Comment Auto Approve</th>
                                <td width="30%"><input class="form-check-input-lg" type="checkbox" value="1" id="example-checkbox-default1" name="comment_auto" <?= ($setting->comment_auto == 1)? 'checked' : '' ?>></td>
                            </tr>
                            <tr>
                                <th>User Auto Approve</th>
                                <td width="30%"><input class="form-check-input-lg" type="checkbox" value="1" id="example-checkbox-default1" name="user_auto" <?= ($setting->user_auto == 1)? 'checked' : '' ?>></td>
                            </tr>
                            <tr>
                                <th>Recent Post Limit</th>
                                <td width="30%"><input type="text" name="recent_limit" class="form-control" value="{{ $setting->recent_limit }}" /></td>
                            </tr>
                            <tr>
                                <th>Popular Post Limit</th>
                                <td width="30%"><input type="text" name="popular_limit" class="form-control" value="{{ $setting->popular_limit }}"/></td>
                            </tr>
                            <tr>
                                <th>Recent Comments Limit</th>
                                <td width="30%"><input type="text" name="recent_comment_limit" class="form-control" value="{{ $setting->recent_comment_limit }}"/></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary mb-2 float-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection