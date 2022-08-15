<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Car Parking Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3>Car Parking Management System</h3>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-md-12">
                @if ($errors->any())
                <ul class="alert alert-danger requiredList">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                 @endif
                <div>
                    @if (Session::has('message'))
                        <h3 class="text-center text-success mt-3 mb-3">{{Session::get('message')}}</h3>
                    @endif
                </div>
                <form action="/book-car-parking" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter Name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="car_number">Car Number</label>
                                <input type="text" name="car_number" placeholder="Car Number" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="booking_start_date">Booking Start Date</label>
                                <input type="date"  min="{{date('Y-m-d')}}" name="booking_start_date" placeholder="Booking Start Date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="duration">Duration(in days)</label>
                                <input type="number" min="1" max="30" name="duration" placeholder="Duration" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label>Services</label>
                            <div style="display: grid;grid-template-columns:1fr 1fr 1fr;">
                                @foreach ($services as $service)
                                @if ($service->is_basic_service == 1)
                                    <div>
                                        {{$service->name}} (Fees = {{$service->fee ?? '0'}})
                                        <input type="hidden" value="{{$service->id}}" name="services[]">
                                    </div>
                                @else
                                <div>
                                    <input type="checkbox" value="{{$service->id}}" data-fee="{{$service->fee ?? '0'}}" name="services[]" id="service{{$service->id}}"> {{$service->name}} (Fees = {{$service->fee ?? '0'}})
                                  </div>
                                @endif

                               @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="notes">Notes</label>
                                <textarea name="notes" id="notes" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success">Book Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>