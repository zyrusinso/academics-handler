@extends('layouts.dash')

@section('content')
<link rel="stylesheet" href="{{ asset('dash-assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">

<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Package
            </h1>
        </div>
    </div>
</div>
<div class="content">
    <div class="block block-rounded overflow-hidden">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">
            <li class="nav-item">
                <button type="button" class="nav-link active" id="search-projects-tab" data-bs-toggle="tab"
                    data-bs-target="#search-projects" role="tab" aria-controls="search-projects"
                    aria-selected="true">Packages</button>
            </li>
        </ul>

        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="search-projects" role="tabpanel"
                aria-labelledby="search-projects-tab">
                <table class="table table-striped table-vcenter" id="DataTables">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr>
                            <td>
                                <h4 class="h5 mt-3 mb-2">
                                    {{ $package->title }}
                                </h4>
                            </td>
                            <td>{{ $package->category }}</td>
                            <td>{{ $package->price }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                <a href="{{ route('package.show', $package->id) }}">
                                    <button type="button" class="btn btn-sm btn-alt-secondary js-bs-tooltip-enabled" data-bs-toggle="tooltip" title="" data-bs-original-title="Edit">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </a>
                                
                                <form action="#" method="post" id="delete-service">
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
                            <td>
                                <h4><a href="{{ route('package.create') }}"><i class="fa fa-plus">Add more services</i></a></h3>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // $(function(){
    //     $('#DataTables').DataTable();
    //     // $('#DataTables').DataTable({
    //     //     "paging": true,
    //     //     "lengthChange": false,
    //     //     "searching": false,
    //     //     "ordering": true,
    //     //     "info": true,
    //     //     "autoWidth": true,
    //     //     "responsive": false,
    //     // });
    // });
</script>
@endsection