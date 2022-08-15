@extends('backend.master')
@section('content')

<ol class="breadcrumb justify-content-end">
    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Services</a></li>
    <li class="breadcrumb-item active">All Services</li>
</ol>
<div class="panel panel-inverse">
    <div class="panel-heading" style="display:flex;justify-content:space-between;">
        <h4 class="panel-title">Services</h4>
        <a href="{{ url('/admin/services/create') }}" class="btn btn-success btn-sm add-btn mb-3" title="Add New Service">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
    </div>
<div class="panel-body">
    <div>
        @if (Session::has('message'))
            <h5 class="text-success mt-3 mb-3">{{Session::get('message')}}</h5>
        @endif
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service Name</th>
                <th>Fee</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
               <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->name}}</td>
                <td>{{$service->fee ?? '0'}}</td>
                <td>
                    <a href="{{ url('/admin/services/' . $service->id . '/edit') }}" title="Edit Service">
                        <button class="btn btn-primary" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>                    
                    </button>
                </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'url' => ['/admin/services', $service->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'title' => 'Delete Service',
                        'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}

                </td>
               </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection