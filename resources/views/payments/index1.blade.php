@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>payments</h2>
            </div>
            <div class="pull-right">
                @can('payment-create')
                <a class="btn btn-success" href="{{ route('payments.edit') }}"> Create New payment</a>
                @endcan
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
<th>Class</th>
<th>Date of Birth</th>
<th>NCC Candidate</th>
<th>Total Payments</th>

@foreach ($payments as $payment)
<tr>

<td>{{ $payment->first_name}} {{ $payment->last_name}}</td>
<td>{{ $payment->class}}</td>
<td>{{ date("d-m-Y",strtotime( $payment->dob )) }}</td>
<td>@if($payment->is_ncc == 1)yes @else no @endif</td>
<td>@if($payment->confirmed == "1"){{ $payment->amount }} @else not confirmed @endif</td>



@endforeach



</table>


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection