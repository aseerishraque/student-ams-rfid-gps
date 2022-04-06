@extends('layouts.admin_layout')
@section('title')
    Yearly Report
@endsection
@section('content')
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
                                <option value="">---Class - 10</option>
                                <option value="">---Class - 9</option>
                                <option value="">---Class - 6</option>
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
                            <button type="button" class="btn btn-primary">Filter</button>
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
                                <th scope="col">Username</th>
                                <th scope="col">Name</th>
                                <th scope="col">IN</th>
                                <th scope="col">OUT</th>
                                <th scope="col">Attendance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <th scope="row">2312</th>
                                <th scope="row">mark.12353423</th>
                                <td>Mark</td>
                                <td>09/07/2018 2:16AM</td>
                                <td>09/07/2018 2:16AM</td>
                                <td>
                                    <span class="text-success font-weight-bold">Present</span>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <th scope="row">2312</th>
                                <th scope="row">mark.12353423</th>
                                <td>Mark</td>
                                <td>09/07/2018 2:16AM</td>
                                <td>09/07/2018 2:16AM</td>
                                <td>
                                    <span class="text-danger font-weight-bold">Absent</span>
                                </td>
                            </tr>
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
