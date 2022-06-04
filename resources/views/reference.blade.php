@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <h1 class="find-source mb-5">Find your source:-</h1>
        {{-- REFERENCE COMPONENT --}}
        <reference-main></reference-main>
    </div>
@endsection

@section('css')

<style>
h1.find-source {
    font-size: 1.4rem;
    color: #7d7a7a;
}
</style>
@endsection

@section('scripts')
    <script src="{{ asset('js/package/citeproc-js/citeproc.js') }}"></script>
@endsection
