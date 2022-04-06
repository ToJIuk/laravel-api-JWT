@extends('layouts.main')

@section('title', 'Records table')

@section('content')
    <h1>@yield('title')</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">DateTime</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @include('myTest.includes.record')
        </tbody>
    </table>
    {{ $records->links('vendor.pagination.bootstrap-4') }}
@stop
