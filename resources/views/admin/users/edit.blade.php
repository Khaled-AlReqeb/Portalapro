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

    @component('admin.shared.edit',['pageTitle' => $pageTitle ,'pageDes' => $pageDes ])

        <form action="{{ url('admin/users/update' , ['id' => $row->id] )}}" method="post">
           {{ method_field('put') }}
           @include('admin.'.$folderName.'.form')
           <button type="submit" class="btn btn-primary pull-right">Update {{$moduleName}}</button>
           <div class="clearfix"></div>
        </form>

     @endcomponent
@endsection





