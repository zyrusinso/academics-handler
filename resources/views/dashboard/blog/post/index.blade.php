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
                <table class="table table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Full Image</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $data)
                        <tr>
                            <td>
                                <h4 class="h5 mt-3 mb-2">
                                    {{ $data->title }}
                                </h4>
                            </td>
                            <td>
                                <img src="{{ asset('storage').'/'.$data->thumb }}" width="100" />
                            </td>
                            <td>
                                <img src="{{ asset('storage').'/'.$data->full_img }}" width="100" />
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('post.show', $data->id) }}">
                                        <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                            data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </a>

                                    <form action="{{ route('post.destroy', $data->id) }}" method="post"
                                        id="delete-service">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled"
                                            onclick="if(confirm('Are you sure to delete service?')){event.preventDefault(); $(this).closest('form').submit();} ">
                                            <i class="fa fa-fw fa-times" style="color: red"></i>
                                        </button>
                                </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <h4><a href="{{ route('post.create') }}"><i class="fa fa-plus">Add more Post</i></a>
                                    </h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END Page Content -->

@endsection