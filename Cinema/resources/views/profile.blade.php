@extends('layouts.app')
@section('content')


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>{{Auth::User()->name}}</h1>
					 
				</div>
			</div>
		</div>
	</div>
</div>
<div class="page-single">
	<div class="container">
		<div class="row ipad-width">
			<div class="col-md-3 col-sm-12 col-xs-12">
				<div class="user-information">
					<div class="user-img">
                                            <a href="#"><img src="{{Auth::User()->profile_pic}}" style="height: 300px; width: 250px"alt=""><br></a>
					</div>
				 
					<div class="user-fav">
						<p>Others</p>
						<ul>    
                                                    <li style="color: white">Role: {{Auth::User()->role}}</li>
                                    
							 
							<li><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                                            </a>
                                    </li>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="form-style-1 user-pro" action="#">
                                    
					   @if ($message = Session::get('success'))
                            <div class="m-2 alert alert-success ">
                                <p style="color: black; font-weight: bold">{{ $message }}</p>
                                </div>
                                      @endif
                                           @if ($message = Session::get('error'))
                            <div class="m-2  alert alert-danger ">
                                <p style="color: black; font-weight: bold">{{ $message }}</p>
                                </div>
                                      @endif
					<form  action="/update/{{Auth::user()->id}}" method="post">
                                             @csrf 
						<h4>Profile details</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Username</label>
                                                                <input type="text" name="name"  value="{{Auth::User()->name}}" >
							</div>
							<div class="col-md-6 form-it">
								<label>Email Address</label>
								<input type="text" value="{{Auth::User()->email}}"  readonly>
							</div>
						</div>
						 <div class="row">
							<div class="col-md-12 form-it">
							<label>Profile pic url</label>
                                                        <input type="text" name="profile_pic" value="{{Auth::User()->profile_pic}}" >	 
							</div>
						</div>
						 
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="save">
							</div>
						</div>	
					</form>
	
                                    <form  action="/updatepass/{{Auth::user()->id}}" method="post" class="password">
                                             @csrf 
						<h4> Change password</h4>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Old Password</label>
                                                                <input type="text" name="old" >
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>New Password</label>
								<input type="text" name="new" >
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-it">
								<label>Confirm New Password</label>
								<input type="text" name="confirm"  >
							</div>
						</div>
						<div class="row">
							<div class="col-md-2">
								<input class="submit" type="submit" value="change">
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>
</div>




@endsection