@extends('layout')
@section('title','Add Employee')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-10 mx-auto">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4"> Add Employee</h6>
            @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif

        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
            <form method="POST" action="{{ url('employee') }}">
                @csrf <!-- Add the CSRF token for Laravel -->
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">
                    <label for="firstname">First Name</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control id="lastname" name="lastname" placeholder="Last Name">
                    <label for="lastname">Last Name</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                    <label for="address">Address</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                    <label for="mobile">Mobile</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="position" name="position" placeholder="Position">
                    <label for="position">Position</label>
                </div>
    
                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="joined" name="joined">
                    <label for="joined">Joined Date</label>
                </div>
    
                <div class="row">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-success btn-block btn-lg"><i class="fas fa-database"></i> Submit</button>
                    </div>                
                    <div class="col-md-4">
                        <a href="{{url('employee')}}" class="btn btn-secondary btn-block btn-lg"> <i class="fas fa-stream"></i> Back to List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection