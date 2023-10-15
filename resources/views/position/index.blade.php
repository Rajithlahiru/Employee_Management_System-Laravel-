@extends('layout')
@section('title','All Positions')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Position Details</h6>
            <a href="{{url('position/create')}}" class="btn btn-outline-success"> <i class="fas fa-plus"></i>Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Position</th>
                        <th scope="col">Basic_Salary</th>
                        <th scope="col">OT_salary_ph</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data)
	                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->position_name }}</td>
                        <td>{{ $d->basic_salary }}</td>
                        <td>{{ $d->overtime_salary_per_hour}}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{url('position/'.$d->id.'/edit')}}">Edit</a>
                            <a onclick="return confirm('Are you sure to delete this data?')"class="btn btn-sm btn-danger" href="{{url('position/'.$d->id.'/delete')}}">Delete</a>
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