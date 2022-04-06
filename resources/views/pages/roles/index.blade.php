@extends('layouts.admin_layout')
@section('title')
    Roles
@endsection
@section('content')
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Roles List</h4>
                    <p class="float-right">
{{--                        @if(Auth::guard('admin')->user()->can('role.create'))--}}
                            <a class="btn btn-primary mb-3" href="{{ route('roles.create') }}" role="button">Create New Role</a>
{{--                        @endif--}}
                    </p>
                    @include('includes.messages')
                    <div class="data-tables">
                        <table width="100%" id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                            <tr>
                                <th width="5%">SL</th>
                                <th width="10%" >Name</th>
                                <th width="60%">Permissions</th>
                                <th width="15%">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $perm)
                                            <span class="badge badge-info mr-1">
                                                {{ $perm->name }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
{{--                                        @if(Auth::guard('admin')->user()->can('role.edit'))--}}
                                            <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}" role="button">Edit</a>
{{--                                        @endif--}}

{{--                                        @if(Auth::guard('admin')->user()->can('role.edit'))--}}
                                        <!-- Delete Trigger modal -->
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_{{ $role->id }}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Warning !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete {{ $role->name }} ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <a class="btn btn-danger text-white" href="{{ route('roles.destroy', $role->id) }}"
                                                           onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                                            Delete
                                                        </a>
                                                        <form id="delete-form-{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: none;">
                                                            @method('DELETE')
                                                            @csrf
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        @endif--}}




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
