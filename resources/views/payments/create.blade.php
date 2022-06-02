<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Laravel 8 CRUD Tutorial From Scratch</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
	<div class="container mt-2">
	<div class="row">
	<div class="col-lg-12 margin-tb">
	<div class="pull-left mb-2">
	<h2>Student payment</h2>
	</div>
			<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('payments.index') }}"> Back</a>
			</div>
			</div>
			</div>
@if(session('success'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
@csrf


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student name</strong>
<select name="student_id" id="cars">
	@foreach($students as $student)
  <option value="{{$student->id}}">{{$student->first_name}}{{$student->last_name}}</option>
  @endforeach

</select>
@error('date')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Date</strong>
<input type="date" name="date" class="form-control" placeholder="Date">
@error('date')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Amount</strong>
<input type="integer" name="amount" class="form-control" placeholder="Amount">
@error('amount')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>

