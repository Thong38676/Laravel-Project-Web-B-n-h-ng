@extends('Client.layouts.main')
@section('content')
<h3 class="text-center text-danger mt-5">Purchase History</h3>
<div class="row ml-4">

	@if(count($order) > 0)
	<table class="table table-bordered"  width="100%" cellspacing="0">
		<thead>
			<tr>
				<th>Stt</th> 
				<th>Time</th>
				<th>Status</th>
				<th>Total amount</th>
			</tr>
		</thead>
		<tbody>
			@foreach($order as $key => $order)
			<tr>
				<td>{{++$key}}</td>
				<td class="text-danger"><strong>{{$order->created_at->diffForHumans()}}</strong></td>
				<td>                          
					@if($order->status =="Unconfirmed")                                  
					<span class="badge badge-danger">Unconfirmed</span>
					@else
					<span class="badge badge-success">Confirmed</span>
					@endif

				</td>
				<td>{{$order->total_amount}}$</td>
			</tr>
			@endforeach		
		</tbody>	
	</table>	
	@else
	<h5 class="text-center text-danger">You haven't purchase anything yet</h5>
	@endif
</div>
@endsection