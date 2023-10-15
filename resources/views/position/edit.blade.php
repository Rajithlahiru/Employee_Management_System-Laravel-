@extends('layout')
@section('title','Edit Position')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-10 mx-auto">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4"> Edit Position</h6>
            @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
            <form method="POST" action="{{ url('position/'.$data->id) }}" enctype="multipart/form-data">
                @method('put')
                @csrf <!-- Add the CSRF token for Laravel -->
    
                <div class="form-floating mb-3">
                    <input type="text" value="{{$data->position_name}}" class="form-control" id="position_name" name="position_name" placeholder="Position">
                    <label for="position_name">Positon</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" value="{{$data->basic_salary}}" class="form-control" id="basic_salary" name="basic_salary" placeholder="Basic Salary">
                    <label for="basic_salary">Basic Salary</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" value="{{$data->overtime_salary_per_hour}}" class="form-control" id="overtime_salary_per_hour" name="overtime_salary_per_hour" placeholder="overtime_salary_per_hour">
                    <label for="overtime_salary_per_hour">Overtime Salary Per Hour</label>
                </div>
                    <div class="row">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fas fa-database"></i> Submit</button>
                    </div>                
                    <div class="col-md-4">
                        <a href="{{url('position')}}" class="btn btn-secondary btn-block btn-lg"> <i class="fas fa-stream"></i> Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection