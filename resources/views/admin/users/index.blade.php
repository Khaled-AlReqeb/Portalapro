@extends('admin.layout.app')

@section('title')
{{$pageTitle}}
    @endsection
{{--this is the index view for user controller--}}

@section('content')

    @component('admin.layout.header')
       @slot('nav_title')
       {{$pageTitle}}
       @endslot
    @endcomponent

    @component('admin.shared.table',['pageTitle' => $pageTitle , 'pageDes' => $pageDes ])

    @slot('addButton')

           <div class="col-md-4 text-right">
               <a href="{{ route($routeName.'.create') }}" class="btn btn-white btn-round">
                Add {{$sModuleName}}
              </a>
               <a href="{{ '/users/export' }}" class="btn btn-white btn-round">
                   Export Excel
               </a>
           </div>

    @endslot
    <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr>
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          email
                        </th>
                        <th>
                          group
                        </th>
                        <th class="text-right">
                          control
                        </th>
                      </tr></thead>
                      <tbody>
                      @foreach($rows as $row)
                         <tr>
                             <td>
                                {{$row->id}}
                             </td>
                             <td>
                                {{$row->name}}
                             </td>
                             <td>
                                {{$row->email}}
                             </td>
                             <td>
                                 {{$row->group}}
                             </td>
                             <td class="td-actions text-right">
                             @include ('admin.shared.buttons.edit' )
                             @include ('admin.shared.buttons.delete' )

                            </td>
                         </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {!! $rows->links() !!}
                  </div>
    @endcomponent

    @endsection



