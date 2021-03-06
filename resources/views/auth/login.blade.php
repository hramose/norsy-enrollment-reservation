@extends('template.default')

@section('styles')

<style type="text/css">
	a {
		
		color: gray;
	}
	.well{
		margin-top: 10%;
		
		
		border-top-right-radius: 100px;
		border-bottom-left-radius: 100px;
	}
	body{
		background-color: #2980b9;
	}
	img{
		margin-top: -60px;
	}
</style>
@endsection


@section('contents')
<div class="container">
	<div class="col-md-6 col-md-offset-3 well" data-toggle="tooltip" title="{{Session::get('err')}}" data-placement="right">
		<center><a href="{{url('/')}}"><img src="{{URL::to('image/logo.png')}}" alt="Logo here" width="120px"></a></center>
		<form action="{{route('login_check')}}" method="POST">
			<div class="form-group {{$errors->has('student_id') ? 'has-error' : ''}}" data-toggle="tooltip" title="{{$errors->first('student_id')}}" data-placement="left">
				<label>Student I.D</label>
				<input type="text" name="student_id" class="form-control" maxlength="15" placeholder="Enter I.D Number">
				
			</div>
			<div class="form-group {{$errors->has('password') ? 'has-error' : ''}}" data-toggle="tooltip" title="{{$errors->first('password')}}" data-placement="left">
				<label>Password</label>
				<input type="password" name="password" class="form-control" maxlength="12" placeholder="Enter Password">
				
			</div>
			<div class="form-group">
				{{csrf_field()}}
				<button type="submit" class="btn btn-warning btn-lg btn-block">Sign-In</button>
				<center style="margin-top: 10px"><a href="#" >Forgot Password</a></center>
			</div>
		</form>
	</div>
</div>

@endsection


@section('scripts')
	<script>
		@if(Session::has('err'))
			$(".well").tooltip('show');
		@endif
		$(document).ready(function(){
		   
		    @if($errors->has('student_id'))
				$("[data-toggle='tooltip']").tooltip('show');	
			@endif  
			@if($errors->has('password'))
				$("[data-toggle='tooltip']").tooltip('show');	
			@endif 
		});
	</script>

@endsection