@extends('layouts.admin_layout')
@section('title')
    Daily Report
@endsection
@section('content')
    @include('includes.messages')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('reports.daily.filter') }}" method="post">
                    @csrf
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Date Start</label>
                                <input type="date" class="form-control" name="start_date">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Date End</label>
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>


                <div class="single-table">
                    <div class="table-responsive">
                        <table width="100%" id="dataTable" class="table text-center">
                            <thead class="text-uppercase bg-dark">
                            <tr class="text-white">
                                <th scope="col">SL</th>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">IN</th>
                                <th scope="col">OUT</th>
                                <th scope="col">Attendance</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach($attendances as $atd)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <th scope="row">{{ $atd->student_id }}</th>
                                <th scope="row">{{ $atd->username }}</th>
                                <td>{{ $atd->name }}</td>
                                <td>{{ $atd->date }}</td>
                                <td>09/07/2018 2:16AM</td>
                                <td>09/07/2018 2:16AM</td>
                                <td>
                                @if($atd->is_present == 1)
                                    <span class="text-success font-weight-bold">Present</span>
                                @else
                                    <span class="text-danger font-weight-bold">Absent</span>
                                @endif
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
