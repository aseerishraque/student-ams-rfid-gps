@extends('layouts.admin_layout')
@section('title')
    Monthly Report
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('reports.monthly.filter') }}" method="post">
                        @csrf
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Classroom:</label>
                                    <select name="classroom_id" class="form-control">
                                        <option value="">---Select Classroom---</option>
                                        @foreach($classrooms as $classroom)
                                            <option value="{{ $classroom->id }}">---{{ $classroom->name }}---</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Month Start</label>
                                    <select required name="start_month" class="form-control">
                                        <option value=""> --- Start Month --- </option>
                                        @for($i=1;$i<=12;$i++)
                                            <option value="{{ $i }}"> --- {{ date('F', mktime(0,0,0,$i, 1, date('Y'))) }} --- </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Month End</label>
                                    <select required name="end_month" class="form-control">
                                        <option value=""> --- Start Month --- </option>
                                        @for($i=1;$i<=12;$i++)
                                            <option value="{{ $i }}"> --- {{ date('F', mktime(0,0,0,$i, 1, date('Y'))) }} --- </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>

               @foreach($months as $month)
                    <!-- Sample Month Start-->
                @if(isset($classroom_name))
                    <h3 class="text-center mt-2">Monthly Data of {{ date('F', mktime(0,0,0,$month->month, 1, date('Y'))) }} - {{ $classroom_name }}</h3>
                @else
                    <h3 class="text-center mt-2">Monthly Data of {{ date('F', mktime(0,0,0,$month->month, 1, date('Y'))) }}</h3>
                @endif
                    <div class="single-table mb-2">
                        <div class="table-responsive">
                            <table id="dataTable" class="table text-center" style="font-size: 10px">
                                <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">SL</th>
                                    <th scope="col">Student</th>
                                    @for($day=1;$day<=31;$day++)
                                        <th>{{ $day }}</th>
                                    @endfor
                                </tr>
                                </thead>
                                <tbody>
                    @foreach($students as $student)
                                <tr>
                                    <td class="border border-dark">{{ $loop->index + 1 }}</td>
                                    <td class="border border-dark">{{ $student->student_id }} <br> {{ $student->name }}</td>
                        @php
                            $count_present = 1;
                            $count_absent = 1;
                        @endphp
                        @for($day=1;$day<=31;$day++)
                            @if(isset($data[$student->student_id][$month->month][$day]))
                                @if($data[$student->student_id][$month->month][$day] == 1)
                                    <td class="border border-dark bg-success text-white">P <br>
                                        {{ $count_present++ }}
                                    </td>
                                @else
                                    <td class="border border-dark bg-danger text-white">A <br>
                                        {{ $count_absent++ }}
                                    </td>
                                @endif
                            @else
                                <td class="border border-dark">
                                    -
                                </td>
                            @endif

                        @endfor
                                </tr>
                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Sample Month END-->
               @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
{{--@section('datatable-styles')--}}
{{--    @include('includes.datatable-styles')--}}
{{--@endsection--}}
{{--@section('datatable-scripts')--}}
{{--    @include('includes.datatable-scripts')--}}
{{--@endsection--}}
