@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>payments</h2>
            </div>
            <div class="pull-right">
                @can('payment-create')
                <a class="btn btn-success" href="{{ route('payments.create') }}"> Create New payment</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

<a class="btn btn-success" href="{{route('payments.create')}}"> New Payment</a>
<a class="btn btn-primary"  href="{{route('students.index')}}">Students page</a>
<form action="{{route('logout')}}" method="POST">
	@csrf
	<button style="margin-left:1000px;" class="btn btn-danger"  type="submit">Logout</button>
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
<th>Student Name</th>
<th>Date</th>
<th>Amount</th>



@foreach ($payments as $payment)
<tr>

<td>{{ $payment->first_name}} {{ $payment->last_name}}</td>
<td>{{ $payment->date}}</td>
<td>{{ $payment->amount }}</td>



@endforeach
</table>
 {!! $payments->links() !!}
<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection