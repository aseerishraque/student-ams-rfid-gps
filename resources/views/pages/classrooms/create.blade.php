@extends('layouts.admin_layout')
@section('title')
    Create Classroom
@endsection
@section('content')
    <div class="m-3 row justify-content-center">
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Create Classroom</h5>
                    @include('includes.messages')
                    <form action="{{ route('classrooms.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="Name">Classroom Name</label>
                            <input value="{{ old('name') }}" name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Section">Section</label>
                            <input value="{{ old('section') }}" name="section" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="workingDays">Working days(Optional)</label>
                            <input value="{{ old('working_days') }}" name="working_days" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="marks">Marks(Optional)</label>
                            <input value="{{ old('marks') }}" name="marks" type="number" class="form-control">
                        </div>
                        <label class="sr-only" for="classRoomCode">Classroom Code</label>
                        <div class="input-group mb-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <button id="refresh_code" type="button" class="btn btn-primary btn-sm">
                                    <i id="code_icon" class="fa fa-refresh fa-2x"></i>
                                </button>
                            </div>

                            <input name="join_code" readonly value="{{ $join_code }}" type="text" class="form-control" placeholder="Classroom Code">
                        </div>
                        <div class="form-group">
                            <label for="SendMessage">Send Message To Guardian</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="send_msg_guardian"  value="1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    Send
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="send_msg_guardian"  value="0">
                                <label class="form-check-label" for="exampleRadios1">
                                    Don't Send
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-scripts')
   @include('includes.code-refresh-script')
@endsection
