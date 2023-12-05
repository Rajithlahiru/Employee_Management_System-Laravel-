@extends('layout')
@section('title','All Employees')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Employee Details</h6>
            <a href="{{url('employee/create')}}" class="btn btn-outline-success"> <i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">ID</th>
                        <th scope="col">FirstName</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Position</th>
                        <th scope="col">Joined Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
	                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->employee_id }}</td>
                        <td>{{ $d->FirstName }}</td>
                        <td>{{ $d->Mobile }}</td>
                        <td>{{ $d->Email }}</td>
                        <td>{{ $d->PositionID }}</td>
                        <td>{{ $d->JoinedDate }}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{url('employee/'.$d->employee_id.'/edit')}}">Edit</a>
                            <a onclick="return confirm('Are you sure to delete this data?')"class="btn btn-sm btn-danger" href="{{url('employee/'.$d->employee_id.'/delete')}}">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection