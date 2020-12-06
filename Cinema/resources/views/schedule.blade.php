@extends('layouts.app')
@section('content')

<div class="hero common-hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="hero-ct">
					<h1> SCHEDULE</h1>
					<ul class="breadcumb">
						<li class="active"><a href="#">Home</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-single movie_list">
	<div class="container">
		<div class="row ipad-width2">
                    <?php 
                        
                       function cmp($a, $b) {
                                     return strcmp($a->time, $b->time);
                                    }
                                  
                    ?><div class="col-md-8 col-sm-12 col-xs-12">
                    @foreach($days as $day)
			<?php 
                        
                        $day_films = array();
                        
                             
                        ?>
				<div class="topbar-filter">
					<p>  <span>{{$day->text}} </span> </p>
			
				</div>
                            
                             
                             @foreach($day->movies as $film)
                             
                             @if(!in_array($film->id,$day_films ))
                             
                             <?php 
                             
                             $hall1 = [];
                             $hall2 = [];
                             $hall3 = [];
                             $hall4 = [];
                             
                             
                            
                             
                       
                             foreach ($film->schedules as $schedule){
                                 if($schedule->day_id == $day->id){
                                 if($schedule->hall_number == 1){
                                  $hall1[] =  $schedule;  
                                 }
                                  if($schedule->hall_number == 2){
                                  $hall2[] =  $schedule;  
                                 }
                                  if($schedule->hall_number == 3){
                                  $hall3[] =  $schedule;  
                                 }
                                  if($schedule->hall_number == 4){
                                  $hall4[] =  $schedule;  
                                 }
                                 }
                             }
                          

                            usort($hall1, "cmp");
                             usort($hall2, "cmp");
                              usort($hall3, "cmp");
                               usort($hall4, "cmp");
                             ?>
                              
                              
				<div class="movie-item-style-2">
                                    <img src="{{$film->large_pic}}" style="height: 330px; width: 220px"alt="">
					<div class="mv-item-infor">
						<h6><a href="moviesingle.html">{{$film->title}} <span>({{$film->year}})</span></a></h6>
                                                
                                                
                                                
						<p class="rate"><i class="ion-android-star"></i><span>{{$film->rating}}</span> /10</p>
						 
						<p class="describe"> </p>
                                                
                                                @if (!empty($hall1))
						<p class="run-time"> <span>   1 hall   </span>   
                                                    @foreach($hall1 as $sc)
                                                    <span> <a href="schedule_detail/{{$sc->id}}"> {{ $sc->time }} </a>  </span> 
                                                    @endforeach
                                         
                                                </p>
                                                @endif
                                                 @if (!empty($hall2))
                                                <p class="run-time"> <span>   2 hall   </span>   
                                                    @foreach($hall2 as $sc)
                                                    <span>  <a href="schedule_detail/{{$sc->id}}"> {{ $sc->time }} </a>    </span> 
                                                    @endforeach
                                         
                                                </p>
                                                  @endif
                                                 @if (!empty($hall3))
						<p class="run-time"> <span>   3 hall   </span>   
                                                    @foreach($hall3 as $sc)
                                                    <span>  <a href="schedule_detail/{{$sc->id}}"> {{ $sc->time }} </a>     </span> 
                                                    @endforeach
                                         
                                                </p>
                                                  @endif
                                                 @if (!empty($hall4))
                                                <p class="run-time"> <span>   4 hall   </span>   
                                                    @foreach($hall4 as $sc)
                                                    <span>  <a href="schedule_detail/{{$sc->id}}"> {{ $sc->time }} </a>   </span> 
                                                    @endforeach
                                         
                                                </p>
                                                @endif  
					</div>
				</div>
				
                    <?php 
                    
                    $day_films[] = $film->id;
                    
                    ?>
                             @endif  
                             
				@endforeach  
			
                    @endforeach
                    </div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="sidebar">
					<div class="searh-form">
						<h4 class="sb-title">Premiere</h4>
						<div class="ads">
							<img src="image/joker.jpg" alt="">
						</div>
					</div>
					<div class="ads">
						<img src="image/avangard.jpeg" alt="">
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection