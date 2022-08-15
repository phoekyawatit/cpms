@extends('backend.master')
@section('content')
<div class="container">
    <div class="panel panel-inverse">
        <div class="panel-heading" style="display:flex;justify-content:space-between;">
            <h4 class="panel-title">Edit Customer</h4>
            <button onclick="window.history.back()" class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <ul class="alert alert-danger requiredList">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            {!! Form::model($customer, [
                'method' => 'PATCH',
                'url' => ['/admin/customers', $customer->id],
                'class' => 'form-horizontal'
            ]) !!}
            
            @include ('backend.customers.form', ['formMode' => 'edit'])
            
            {!! Form::close() !!}

        </div>
    </div>
</div>
@endsection