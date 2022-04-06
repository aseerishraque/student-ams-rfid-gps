@extends('layouts.admin_layout')
@section('title')
    Leave Requests
@endsection
@section('content')
    @include('includes.messages')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Classroom:</label>
                                <select name="classroom" class="form-control">
                                    <option value="">---Select Classroom---</option>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">---{{ $classroom->name }}---</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>

                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Classroom</th>
                                    <th scope="col">Date</th>
{{--                                    <th scope="col">View</th>--}}
                                    <th scope="col">Approve</th>
                                </tr>
                                </thead>
                                <tbody>
                           @foreach($requests as $req)
                                <tr>
                                    <th scope="row">{{ $loop->index+1 }}</th>
                                    <th scope="row">{{ $req->student_id }}</th>
                                    <td>{{ $req->student_name }}</td>
                                    <td>{{ $req->classroom_name }}</td>
                                    <td>{{ $req->start_date.'-'.$req->end_date }}</td>
{{--                                    <td>--}}
{{--                                        <a class="btn btn-primary" href="#" role="button">View</a>--}}
{{--                                    </td>--}}
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#aprove_{{ $req->id }}">
                                            Click
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="aprove_{{ $req->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Alert !</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to Approve ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form action="{{ route('leave.approve-request', $req->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary">Approve</button>
                                                        </form>
                                                        <form action="{{ route('leave.approve-decline', $req->id) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger">Decline</button>
                                                        </form>
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
        </div>
    </div>
@endsection
@section('datatable-styles')
    @include('includes.datatable-styles')
@endsection
@section('datatable-scripts')
    @include('includes.datatable-scripts')
@endsection
