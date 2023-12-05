@extends('layout')
@section('title','View Attendance')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Attendance Details</h6>
            <a href="{{url('attendance/create')}}" class="btn btn-outline-success"> <i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Employee ID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Working Hours</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
	                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->employee_id }}</td>
                        <td>{{ $d->attendance_date }}</td>
                        <td>{{ $d->working_hours}}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection