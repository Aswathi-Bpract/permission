@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>student</h2>
            </div>
            <div class="pull-right">
                @can('student-create')
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New student</a>
                @endcan
            </div>
        </div>
    </div>


<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Student Class:</strong>





     <form action="{{ route('students.index') }}" method="get">
@csrf

    
       <select name="class" id="class" style="width:100px" >

    <option selected="selected"> {{$class}}</option>
    
    
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

 
       <button type="submit" class="btn btn-danger">Submit</button>
         <br>
       </br>
      </form> 


</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
        <tr>
        <th>Name</th>
        <!-- <th>Last Name</th> -->
        <th>Date of Birth</th>
        <th>Ncc candidate</th>
        <th>Classes</th>
        <th>Amount</th>
        <th width="280px">Action</th>
        </tr>


@foreach ($students as $student)
<tr>

        <td>{{ $student->FullName}}</td>
       <!--  <td{{ $student->last_name }}</td> -->
        <td>{{ date("d-m-Y",strtotime( $student->dob )) }}</td>
        <td>@if($student->is_ncc == 1)yes @else no @endif</td>
        <td>{{ $student->class }}</td>
        <td>{{ $student->tot_amount }}</td>
        <td>
<form action="{{ route('students.destroy',$student->id) }}" method="Post">
@can('student-edit')
<a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
  @endcan
@csrf
@method('DELETE')
@can('student-delete')
<button type="submit" class="btn btn-danger">Delete</button>
  @endcan
</form>
</td>
</tr>
@endforeach
</table>



 {!! $students->links() !!}


@endsection