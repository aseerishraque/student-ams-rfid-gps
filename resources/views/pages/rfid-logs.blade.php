@extends('layouts.admin_layout')
@section('title')
   RFID Logs
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('rfid.logs.filter') }}" method="post">
                        @csrf
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Classroom:</label>
                                    <select name="classroom_id" class="form-control">
                                        <option value="">---Select Classroom---</option>
                                        @foreach($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}"> --- {{ $classroom->name }} ---</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Date Start</label>
                                    <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="start_date">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Date End</label>
                                    <input value="{{ date('Y-m-d') }}" type="date" class="form-control" name="end_date">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="single-table">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">IN</th>
                                    <th scope="col">OUT</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <th scope="row">{{ $log->id }}</th>
                                        <th scope="row">{{ $log->username }}</th>
                                        <td>{{ $log->name }}</td>
                                        <td>{{ $log->in_time }}</td>
                                        <td>{{ $log->out_time }}</td>
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
