@extends ("main")

@section("content")
	<div>
		<p>People You May Know</p>
	</div>

	<div class="row">
		@foreach($users as $user)
			<div class="users_container col-sm-3 col-md-3 col-lg-3">
				<form method="POST" action='{{url("/add/$user->id")}}'>
				{{ csrf_field() }}
					<div>
						<img src="{{ $user->avatar }}">
					</div>
					<div class="username_id">
						User ID: {{ $user->id }}
					</div>
					<div class="username_container">
						{{ $user->name }}
					</div>
					<input type="submit" name="add_friend_button" value="+ Add As Friend">
				</form>
			</div>	
		@endforeach
	</div>
	<div class="friend_requests_container">
		<p>Friend Requests</p>
			<div> 
				@foreach($friendrequests as $friendrequest)
					<div class="  pending_request_container">
						<form method="POST" action='{{url("/confirm_request/$user->id")}}'>
						{{ csrf_field() }}
						<img src="{{ $friendrequest->avatar }}">
						{{ $friendrequest -> name }}
							<input type="submit" name="add_friend_button" value="Approve" id="approve_button">

							<input type="submit" name="delete_request_button" value="Delete Request" id="delete_request_button">
					


						</form>
					</div>
				@endforeach
			</div>
	</div>

@endsection