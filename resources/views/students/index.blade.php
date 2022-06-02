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
        <th>First Name</th>
        <th>Last Name</th>
        <th>Date of Birth</th>
        <th>Ncc candidate</th>
        <th>Classes</th>
        <th>Amount</th>
        <th width="280px">Action</th>
        </tr>


@foreach ($students as $student)
<tr>

        <td>{{ $student->first_name }}</td>
        <td>{{ $student->last_name }}</td>
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
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection