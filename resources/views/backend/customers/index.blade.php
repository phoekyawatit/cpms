@extends('backend.master')
@section('content')

<ol class="breadcrumb justify-content-end">
    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Customers</a></li>
    <li class="breadcrumb-item active">All Customers</li>
</ol>
<div class="panel panel-inverse">
    <div class="panel-heading" style="display:flex;justify-content:space-between;">
        <h4 class="panel-title">Customers</h4>
        <a href="{{ url('/admin/customers/create') }}" class="btn btn-success btn-sm add-btn mb-3" title="Add New Customer">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
    </div>
<div class="panel-body">
    <div>
        @if (Session::has('message'))
            <h5 class="text-center text-success mt-3 mb-3">{{Session::get('message')}}</h5>
        @endif
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
               <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>
                    <a href="{{ url('/admin/customers/' . $customer->id . '/edit') }}" title="Edit Customer">
                        <button class="btn btn-primary" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>                    
                    </button>
                </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'url' => ['/admin/customers', $customer->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'title' => 'Delete Customer',
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