<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{$title}}</h2>
    <p>Please check your booking information below ,</p>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Car Number</th>
            <th>Boooking Start Date</th>
            <th>Duration</th>
            <th>Services</th>
            <th>Notes</th>
        </thead>
        <tbody>
            <td>{{$booking->customer->name}}</td>
            <td>{{$booking->customer->email}}</td>
            <td>{{$booking->booking_start_date}}</td>
            <td>{{$booking->duration}} day(s)</td>
            <td>{{implode(',',$booking->services->pluck('name')->toArray())}}</td>
            <td>{{$booking->notes}}</td>
        </tbody>
    </table>
    <p>Thanks</p>
</body>
</html>