@extends('layouts.conf_calendar_by_month')

@section('CalendarByMonth')


<div class="grid simple transparent  no-margin no-padding">
    <div class="grid-title page-title no-border no-margin no-padding">
        <a href="/ci_conf_calendar"> <i class="fa fa-2x icon-custom-left"></i></a>
        <h3 class="inline semi-bold m-b-5"><span style="color:#FF891F;" class="bold">Conference Calendar</span></h3>
    </div>
</div>

<hr class="no-margin b-transparent">  


<div class="row" style="max-height:600px;">
    <div class="col-md-12">
        <div class="tiles row tiles-container grey no-padding">
            <div class="col-md-12 tiles white no-padding">
                <div class="tiles-body no-padding">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection