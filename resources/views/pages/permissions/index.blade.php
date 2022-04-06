@extends('layouts.admin_layout')
@section('title')
    Permissions
@endsection
@section('content')
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Permissions List</h4>
                    <p class="float-right">
                        {{--                        @if(Auth::guard()->user()->can('role.create'))--}}
                        <a class="btn btn-primary mb-3" href="{{ route('permissions.create') }}" role="button">Create New Permission</a>
                        {{--                        @endif--}}
                    </p>
                    <div class="data-tables">
                        @include('includes.messages')
                        <table width="100%" id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="10%" >Group</th>
                                <th width="60%">Permission</th>
                                <th width="15%">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $permission->group_name }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        {{--                                        @if(Auth::guard('admin')->user()->can('role.edit'))--}}
                                        <a class="btn btn-primary" href="{{ route('permissions.edit', $permission->id) }}" role="button">Edit</a>
                                    {{--                                        @endif--}}
                                    <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $permission->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_{{ $permission->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Warning!</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to Delete - <span class="text-danger">{{ $permission->name }}</span>  ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                                        {{--                                        <a class="btn btn-danger mb-3" href="{{ route('permissions.destroy', $permission->id) }}" role="button">Delete</a>--}}
                                                        {{--                                        @if(Auth::guard('admin')->user()->can('role.edit'))--}}
                                                        <a class="btn btn-danger text-white" href="{{ route('permissions.destroy', $permission->id) }}"
                                                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $permission->id }}').submit();">
                                                            Delete
                                                        </a>
                                                        <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission->id) }}" method="POST" style="display: none;">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>
                                                        {{--                                        @endif--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>





                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
@endsection
@section('datatable-styles')
    @include('includes.datatable-styles')
@endsection
@section('datatable-scripts')
    @include('includes.datatable-scripts')
@endsection
