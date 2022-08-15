@extends('backend.master')
@section('content')

<ol class="breadcrumb justify-content-end">
    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">User</a></li>
    <li class="breadcrumb-item active">All User</li>
</ol>
<div class="panel panel-inverse">
    <div class="panel-heading" style="display:flex;justify-content:space-between;">
        <h4 class="panel-title">Users</h4>
        <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm add-btn mb-3" title="Add New User">
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
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
               <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="{{ url('/admin/users/' . $user->id . '/edit') }}" title="Edit User">
                        <button class="btn btn-primary" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>                    
                    </button>
                </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'url' => ['/admin/users', $user->id],
                        'style' => 'display:inline'
                    ]) !!}
                    @if ($user->email != "admin@cpms.com")
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'title' => 'Delete User',
                        'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}
                    @endif

                </td>
               </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection