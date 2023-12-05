@extends('layout')
@section('title','Mark attendance')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-10 mx-auto">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4"> Add attendance</h6>
            @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
            <form method="POST" action="{{ url('attendance') }}">
                @csrf <!-- Add the CSRF token for Laravel -->
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="employee_id">
                    <label for="employee_id">Employee ID</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="attendance_date" name="attendance_date" placeholder="attendance_date">
                    <label for="attendance_date">Attendance Date</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="working_hours" name="working_hours" placeholder="working_hours">
                    <label for="working_hours">Working Hours</label>
                </div>
                    <div class="row">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fas fa-database"></i> Submit</button>
                    </div>                
                    <div class="col-md-4">
                        <a href="{{url('attendance')}}" class="btn btn-secondary btn-block btn-lg"> <i class="fas fa-stream"></i> Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection