@extends('layouts.admin_layout')
@section('title')
    Classrooms
@endsection
@section('content')
    @include('includes.messages')
<div class="row m-3">
    @if(count($classrooms) > 0)
        @foreach($classrooms as $classroom)
        <div class="col-md-4">
            <div class="card">
                <div class="seo-fact sbg1">
                    <div class="card-body">
                        <a href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="seofct-icon"><i class="ti-bookmark-alt"></i> {{ $classroom->name }}</div>
                                <h2>Section: {{ $classroom->section }}</h2>
                            </div>
                        </a>
                    <p class="card-text">
                        @can("Classrooms.Edit")
                        <div class="icon-container">
                            <span class="ti-settings text-white"></span>
                            <span class="icon-name"> <a href="{{ route('classrooms.edit', $classroom->id) }}" class="text-white">Edit Classroom</a></span>
                        </div>
                        @endcan
                        @can("Admin.Take Attendance")
                        <div class="icon-container">
                            <span class="ti-user text-white"></span>
                            <span class="icon-name"> <a href="{{ route('attendance.get', $classroom->id) }}" class="text-white">Manual Attendance</a></span>
                        </div>
                        @endcan
                        @can("Admin.Track Students")
                        <div class="icon-container">
                            <span class="ti-map-alt text-white"></span>
                            <span class="icon-name"> <a href="{{ route('track.get', $classroom->id) }}" class="text-white">Track Students</a></span>
                        </div>
                        @endcan
                        @can("Students.Apply Leave")
                        <div class="icon-container">
                            <span class="ti-pencil-alt text-white"></span>
                            <span class="icon-name"> <a href="{{ route('leave.apply', $classroom->id) }}" class="text-white">Apply For Leave</a></span>
                        </div>
                        @endcan
                        @can("Classrooms.Delete")
                        <div class="icon-container">
                            <span class="ti-trash text-white"></span>
                            <span class="icon-name">
                                {{-- <a href="#" class="text-white">Delete Classroom</a>--}}
                                <!-- Delete trigger modal -->
                                <a type="button" class="text-white" data-toggle="modal" data-target="#delete_{{ $classroom->id }}">
                                Delete Classroom
                                </a>
                            </span>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="delete_{{ $classroom->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure to Delete - <span class="text-danger">{{ $classroom->name }}</span> ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <form action="{{ route('classroom.destroy', $classroom->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Delete Classroom</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#joinModal">
            Join a Classroom
            </button>

            <!-- Modal -->
            <div class="modal fade" id="joinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter the classroom code:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('classroom.join') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="InputJoinCode">Join Code:</label>
                                    <input name="join_code" type="text" class="form-control" placeholder="Enter join code">
                                </div>
                                <button type="submit" class="btn btn-primary">Join</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

        </div>
    @endif
</div>
@endsection
