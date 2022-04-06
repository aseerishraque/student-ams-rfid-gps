@extends('layouts.admin_layout')
@section('title')
    Apply For Leave
@endsection
@section('content')
    <div class="m-3 row justify-content-center">
        <div class="col-md-4">
            <div class="card" >
                <div class="card-body">
                    <h5 class="card-title">Classroom - {{ $classroom_name }}</h5>
                    @include('includes.messages')
                    <form action="{{ route('leave.apply.post', $classroom_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Subject">Subject</label>
                            <input required value="{{ old('subject') }}" name="subject" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Section">Description</label>
                            <textarea required name="description" class="form-control" cols="30" rows="10">
                                   {{ old('description') }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="Document">Document(Optional)</label>
                            <input name="document" type="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="StartDate">Start Date</label>
                            <input required value="{{ old('start_date') }}" name="start_date" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="EndDate">End Date</label>
                            <input required value="{{ old('end_date') }}" name="end_date" type="date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Apply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

