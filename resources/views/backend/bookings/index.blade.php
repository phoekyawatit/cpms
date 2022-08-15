@extends('backend.master')
@section('content')

<ol class="breadcrumb justify-content-end">
    <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Booking</a></li>
    <li class="breadcrumb-item active">All Booking</li>
</ol>
<div class="panel panel-inverse">
    <div class="panel-heading" style="display:flex;justify-content:space-between;">
        <h4 class="panel-title">Bookings</h4>
        <a href="{{ url('/admin/bookings/create') }}" class="btn btn-success btn-sm add-btn mb-3" title="Add New Booking">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Booking
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
                <th>Booking ID</th>
                <th>Customer Name/Email</th>
                <th>Car Number</th>
                <th>Booking Start Date</th>
                <th>Duration</th>
                <th>Services</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
               <tr>
                <td>{{$booking->id}}</td>
                <td>{{$booking->customer->name}} / {{$booking->customer->email}}</td>
                <td>{{$booking->car_number}}</td>
                <td>{{$booking->booking_start_date}}</td>
                <td>{{$booking->duration}}</td>
                <td>{{implode(',',$booking->services->pluck('name')->toArray())}}</td>
                <td>{{$booking->created_at}}</td>
                <td>
                    <a href="{{ url('/admin/bookings/' . $booking->id . '/edit') }}" title="Edit Booking">
                        <button class="btn btn-primary" type="button">
                        <i class="fa fa-pencil" aria-hidden="true"></i>                    
                    </button>
                    </a>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'url' => ['/admin/bookings', $booking->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger',
                        'title' => 'Delete User',
                        'onclick'=>'return confirm("Confirm delete?")'
                    )) !!}

                </td>
               </tr>
            @endforeach
        </tbody>
    </table>
    {!! $bookings->links() !!}
</div>
</div>
@endsection