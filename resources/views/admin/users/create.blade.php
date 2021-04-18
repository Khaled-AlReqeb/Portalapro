@extends('admin.layout.app')


@section('title')
  {{$pageTitle}}
@endsection


@section('content')

    @component('admin.layout.header')
    @slot('nav_title')
    {{$pageTitle}}
    @endslot
    @endcomponent


    @component('admin.shared.create', ['pageTitle' => $pageTitle , 'pageDes' => $pageDes])
    <form action="{{ route ($routeName.'.store')}}" method="post">
        @include('admin.'.$folderName.'.form')
        <button type="submit" class="btn btn-primary pull-right">Add {{$moduleName}}</button>
        <div class="clearfix"></div>
    </form>
    @endcomponent




    @endsection



