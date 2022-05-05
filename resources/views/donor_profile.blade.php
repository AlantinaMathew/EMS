@extends('layout_donor')


@section('content')


<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Donor Profile</h2>

  <form  action="">
  @foreach($alldata as $tr)
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">DOB</label>
    <div class="col-sm-10">
      {{$tr->dob}}
      </div>
    </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Gender</label>
      <div class="col-sm-10">          
      {{$tr->gender}}
      </div>
    </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Blood Group</label>
      <div class="col-sm-10">          
      {{$tr->bloodgrp}}
      </div>
    </div>
    <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Weight</label>
      <div class="col-sm-10">          
      {{$tr->weight}}
      </div>
    </div>
    
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
    @endforeach
  </form>
</div>



@endsection