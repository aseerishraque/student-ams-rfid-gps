@extends('layouts.admin_layout')
@section('title')
    Edit Permission
@endsection
@section('content')
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Permission - {{ $permission->name }}</h4>
                    @include('includes.messages')

                    <form action="{{ route('permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-check">
                            <input name="group_type" id="list_type" class="form-check-input" type="radio" value="list" checked>
                            <label class="form-check-label" for="gridRadios1">
                                Select from List
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="group_type" class="form-check-input" type="radio" value="new">
                            <label class="form-check-label" for="gridRadios2">
                                Create new group
                            </label>
                        </div>
                        <div class="form-row" id="group_list">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Group Name</label>
                                <select id="list_value" name="group_name" class="form-control select2">
                                    @foreach($group_names as $group_name)
                                        @if($group_name->group_name == $permission->group_name)
                                            <option selected value="{{ $group_name->group_name }}"> {{ $group_name->group_name }}</option>
                                        @else
                                            <option value="{{ $group_name->group_name }}"> {{ $group_name->group_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row d-none" id="group_new">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Group Name</label>
                                <input value="{{ $permission->group_name }}" disabled type="text" class="form-control" id="new_name" name="group_name" placeholder="Enter Group Name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="Username">Name</label>
                                <input value="{{ $permission->name }}" type="text" class="form-control" id="name" name="name" placeholder="Enter Permission Name">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Permission</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
@endsection
@section('custom-scripts')
    @include('includes.select2')
    @include('includes.permission-scripts')
@endsection

