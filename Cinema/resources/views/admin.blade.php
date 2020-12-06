@extends('layouts.app')
@section('content')


<div class="hero user-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1>Admin panel</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
						<li> <span class="ion-ios-arrow-right"></span>Admin</li>
					</ul>
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
						<p>Cruds</p>
						<ul>
                                                    <li  class="active"> <a class="col-12 display-4" href="/days">DAYS CRUD</a> </li>
          <li  class="active">  <a class="col-12 display-4" href="/movies">MOVIES CRUD</a> </li>
              <li  class="active">   <a class="col-12 display-4" href="/schedules">SCHEDULES CRUD</a> </li>
            
							
						</ul>
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
					 
				</div>
			</div>
		</div>
	</div>
</div>




@endsection