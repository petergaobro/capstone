@extends('admin.master')
@section('title', 'Add New Car and dummy address')
@section('content')
    <div class="container">
        <div class="content">
            <div class="title">
                <h2>Add New Car and dummy location</h2>
            </div>


            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif


            {!! Form::model($car, ['action' => 'CarController@store']) !!}


            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null,array('required','class'=>'form-control','placeholder'=>'Add car name here')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('car_model', 'Model') !!}
                {!! Form::text('car_model', null,array('required','class'=>'form-control','placeholder'=>'Add car model here')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price', 'Price') !!}
                {!! Form::text('price', null,array('required','class'=>'form-control','placeholder'=>'Add car price here')) !!}
            </div>

            <div class="form-group">
                {!! Form::label('car_location_id', 'Car location id') !!}
                {!! Form::text('car_location_id', null,array('required','class'=>'form-control','placeholder'=>'Add car location id here')) !!}
            </div>

            <button class="btn btn-success" type="submit">Submit infor</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection