<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Student Form - Laravel 8 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
    <body>
    <div class="container mt-2">
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left mb-2">
<h2>Add Student</h2>
</div>
        <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        </div>
        </div>
        </div>
    @if(session('success'))
    <div class="alert alert-success mb-1 mt-1">
    {{ session('status') }}
    </div>
    @endif
<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student First Name:</strong>
<input type="text" name="first_name" class="form-control" placeholder="Student Name">
@error('first_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student Last Name:</strong>
<input type="text" name="last_name" class="form-control" placeholder="Student Name">
@error('last_name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student DOB</strong>
<input type="date" name="dob" class="form-control" placeholder="Student Name">
@error('dob')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>



<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student is NCC?</strong>
<input type="radio" name="is_ncc" value="1" class="" placeholder="Student Name"> Yes
<input type="radio" name="is_ncc" value="0" class="" placeholder="Student Name"> No
@error('is_ncc')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student Class:</strong>
        <!-- <label for="cars">Choose a class:</label>  -->
        <select id="cars" class="form-control"  name="class">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          
        </select>
@error('class')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>