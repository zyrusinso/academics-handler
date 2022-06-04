@extends('layouts.dash')

@section('content')
<!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Events
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
                            <th>title</th>
                            <th>date</th>
                            <th>time</th>
                            <th>location</th>
                            <th>image</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $data)
                        <tr>
                            <td >
                                <p class="h5 mt-3 mb-2">
                                    {{ $data->title }}
                                </p>
                            </td>
                            <td >
                                <p class="h5 mt-3 mb-2">
                                    {{ $data->date }}
                                </p>
                            </td>
                            <td >
                                <p class="h5 mt-3 mb-2">
                                    {{ $data->start_time }} - {{ $data->end_time }}
                                </p>
                            </td>
                            <td >
                                <p class="h5 mt-3 mb-2">
                                    {{ $data->location }}
                                </p>
                            </td>
                            <td >
                                <p class="h5 mt-3 mb-2">
                                    <img src="{{ asset('storage').'/'.$data->image }}" style="width: 100px">
                                </p>
                            </td>
                            
                            <td class="text-center">
                                <div class="btn-group">
                                <a href="{{ route('event.show', $data->id) }}">
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a>
                                
                                <form action="{{ route('event.destroy', $data->id) }}" method="post" id="delete-service">
                                @csrf
                                @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" onclick="if(confirm('Are you sure to delete service?')){event.preventDefault(); $(this).closest('form').submit();} ">
                                        <i class="fa fa-fw fa-times" style="color: red"></i>
                                    </button>
                                </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="10">
                                <h4><a href="{{ route('event.create') }}"><i class="fa fa-plus">Add more Events</i></a></h3>
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