<div class="form-group{{ $errors->has('customer_id') ? ' has-error' : ''}}">
    {!! Form::label('customer_id', 'Customer*: ', ['class' => 'control-label']) !!}
    {!! Form::select('customer_id',$cutomers,null, ['class' => 'form-control', 'required' => 'required','placeholder' => "Select Customer"]) !!}
    {!! $errors->first('customer_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('car_number') ? ' has-error' : ''}}">
    {!! Form::label('car_number', 'Car Number*: ', ['class' => 'control-label']) !!}
    {!! Form::text('car_number', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('car_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('booking_start_date') ? ' has-error' : ''}}">
    {!! Form::label('booking_start_date', 'Booking Start Date*: ', ['class' => 'control-label']) !!}
    {!! Form::date('booking_start_date', null, ['min' => date('Y-m-d'),'class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('booking_start_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('duration') ? ' has-error' : ''}}">
    {!! Form::label('duration', 'Duration(in days)*: ', ['class' => 'control-label']) !!}
    {!! Form::number('duration', null, ['min' => 1,'class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('duration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
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
<div class="form-group">
    {!! Form::label('notes', 'Note: ', ['class' => 'control-label']) !!}
    {!! Form::textarea('notes', null, ['rows' => 3,'class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
    @if ($formMode === 'edit')
    <button type="submit" class="btn btn-success" name="type" value="paid">Paid</button>
    @endif
    <input type="button" class="btn btn-secondary" value="Cancel" onclick="window.history.back()">
</div>