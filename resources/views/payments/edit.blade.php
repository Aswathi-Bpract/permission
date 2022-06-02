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
<table class="table table-bordered">
<tr>
<th>Student Name</th>
<th>Date</th>
<th>Amount</th>


<th width="280px">Action</th>
</tr>
@foreach ($payments as $payment)
<tr>

<td>{{ $payment->first_name}} {{ $payment->last_name}}</td>
<td>{{ $payment->date}}</td>
<td>{{ $payment->amount }}</td>
<td>@if($payment->confirmed == "1") Confirmed @else <a href="{{ route('payments.update',$payment->id) }}">confirm</a> @endif
</td>

@endforeach
</table>

<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection