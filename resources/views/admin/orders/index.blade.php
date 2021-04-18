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
               <a href="{{ '/orders/export' }}" class="btn btn-white btn-round">
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
                      </tr></thead>
                      <tbody>
                      @foreach($rows as $row)
                         <tr>
                             <td>
                                {{$row->id}}
                             </td>
                             <td>
                                {{$row->product->name}}
                             </td>
                             <td>
                                {{$row->price}}
                             </td>

                         </tr>
                      @endforeach
                      </tbody>
                    </table>
                    {!! $rows->links() !!}
                  </div>
    @endcomponent

    @endsection



