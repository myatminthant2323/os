@extends('backendtemplate')

@section('title','Orders')

@section('content')

	<div class="container-fluid">
		<h2>Order List</h2>
		<table class="table table-border">
			<thead>
				<tr>
					<th>Voucher No</th>
					<th>User</th>
					<th>Total</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $order)
				<tr>
					<td>{{$order->voucherno}}</td>
					<td>{{$order->user_id}}</td>
					<td>{{$order->total}}</td>
					<td>
						<a href="#" class="btn btn-info">Detail</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>
	</div>

@endsection