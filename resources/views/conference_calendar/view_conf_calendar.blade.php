@extends('layouts.conf_calendar')

@section('CalenderMonth')


<section class="no-y-padding">
	<div class="row">	

	@foreach($monthly_calender as $month_name=>$value)
	
		<!-- echo '<small>'.$val.'</small>';
		<small></small> -->
		<?php $cal_type = rand(1,4); ?>

		<div class="col-md-3 no-padding extrasmall-padding">
			<div class="card cal-{{$cal_type}} no-margin" style="border-radius:4px;" >
				<div class="card-head card-head-xs border-b">										
					<header class="text-bold">{{$month_name}}</header>
					<div class="tools">
						<div class="btn-group">
							<span class="badge style-default-bright pull-right">{{$value["Total_Conf"]}}</span>
						</div>
					</div>
				</div>

				@if(!empty($value["Conf_Details"]))
				
					<div class="card-body no-padding height-3 cal-bg" style="border-bottom-right-radius: 4px;  border-bottom-left-radius: 4px;" >
						<div class="owl-carousel height-3">
                                                       <?php $nav_key=0;?>
							@foreach($value["Conf_Details"] as $Conf_Id=>$val)
								<?php $Pin_type = rand(1,7); ?>
							
								<div class="height-2 pin pin{{$Pin_type}}">
                                                                    <a class="tile-content ink-reaction" id="openPopup" onclick="return getDetailConf('<?php echo $nav_key; ?>','<?php echo $month_name; ?>','<?php echo $val["year"]; ?>');" href="#offcanvas-demo-size4" data-toggle="offcanvas">
										<div class="tile-text text-bold" style="padding-top:15px;">
                                                                                    @if(strlen($val["conf_title"])< 45){{ $val["conf_title"]."..." }}
                                                                                    @else {{ substr($val["conf_title"],0,45)."..." }}
                                                                                    @endif
                                                                                    <br/>
                                                                                    <small>{{$val["conf_date"]}}</small>
										</div>
                                                                    </a>
							  	</div>
							<?php $nav_key++ ?>
							@endforeach	

						</div>
					</div>
				
				@else

					<div class="card-body no-padding height-3 cal-bg" style="border-bottom-right-radius: 4px;  border-bottom-left-radius: 4px;" >
						<h4 class="height-4 force-padding">No conference for this month!</h4>
					</div>
						
				@endif
				
			</div>
		</div>
	@endforeach	

	</div>

</section>


@endSection