@extends('backend.master')
@section('content')
<div class="row mt-3">
    <div class="col-md-3 text-center">
       <i class="fa fa-users" aria-hidden="true"></i>
       <div>All Users ({{$alluser}})</div>
    </div>
    <div class="col-md-3 text-center">
        <i class="fa fa-users" aria-hidden="true"></i>
        <div>All Customers ({{$allcustomer}})</div>
    </div>
    <div class="col-md-3 text-center">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
        <div>All Services ({{$allservice}})</div>
    </div>
    <div class="col-md-3 text-center">
        <i class="fa fa-id-card" aria-hidden="true"></i>
       <div> All Bookings ({{$allbooking}})</div>
    </div>
</div>
@endsection