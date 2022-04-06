@extends('layouts.admin_layout')
@section('title')
    Take Attendance
@endsection
@section('content')
    @include('includes.messages')
    <form action="{{ route('attendance.store', $classroom_id) }}" method="post">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input value="{{ date("Y-m-d") }}" type="date" class="form-control" name="date">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit Attendance</button>
                                </div>
                            </div>
                        </div>

                        <div class="single-table">
                            <div class="table-responsive">
                                <table width="100%" id="dataTable" class="table text-center">
                                    <thead class="text-uppercase bg-dark">
                                    <tr class="text-white">
                                        <th scope="col">SL</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Attendance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <th scope="row">{{ $student->student_id }}</th>
                                            <th scope="row">{{ $student->username }}</th>
                                            <th scope="row">{{ $student->name }}</th>
                                            <td class="text-center">
                                                <input name="present[{{ $student->student_id }}]" value="1" type="checkbox" checked class="form-control font-50">
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
    </form>
@endsection
@section('datatable-styles')
    @include('includes.datatable-styles')
@endsection
@section('datatable-scripts')
    @include('includes.datatable-scripts')
@endsection
