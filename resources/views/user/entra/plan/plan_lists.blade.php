@extends('layouts.dashboard')

@section('content')
    <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->

        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="#" class="list-name"> Plans</a> <i class="fa fa-circle"></i>
                </li>

            </ul>
        </div>

        <h1 class="page-title page_title">
            Plans
        </h1>
        <div class="portlet light portlet-fit ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-microphone font-dark hide"></i>
                    <span class="caption-subject bold font-dark uppercase"> Plans</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    <span class="caption-helper">If you want to know more about plans, please contact us : Phone Number... 09456114442</span>
                </div>

            </div>
            <div class="portlet-body">
                <?php
                $tocp = DB::table('plans')->where('user_id', Auth:: user()->id)->count();
                ?>
                @if($tocp != 0)
                    <?php
                    $tocp_data = DB::table('plans')->where('user_id', Auth::user()->id)->first();
                    ?>

                    <div class="col-sm-6 ">
                        <div class="dashboard-stat2 ">
                            <div class="display">
                                <div class="number">
                                    <h3 class="font-red-haze">
                                        <span data-counter="counterup" data-value="Your Plan">Your Plan</span>
                                    </h3>
                                    <small>
                                        @if($tocp_data->plan_type == 1)
                                            <?php
                                            $pt = 'A';
                                            ?>
                                        @elseif($tocp_data->plan_type == 2)
                                            <?php
                                            $pt = 'B';
                                            ?>
                                        @else
                                            <?php
                                            $pt = 'C';
                                            ?>
                                        @endif
                                        Plan Type :{{$pt}} For {{$tocp_data->duration_month}} Month

                                    </small>
                                    <br>
                                    <small>

                                        Start Date
                                        :{{\Carbon\Carbon::parse($tocp_data->start_date)->toDateTimeString()}}

                                    </small>
                                    <br>
                                    <small>

                                        End Date :{{\Carbon\Carbon::parse($tocp_data->expire_date)->toDateTimeString()}}

                                    </small>
                                </div>

                            </div>

                        </div>
                    </div>
                @endif


                <div class="row">&nbsp;</div>
                <div class="row">
                    @if(Auth::user()->type==1)
                        @foreach($plan as $p)
                            @if($p->type == 'A')
                                <div class="col-sm-6 col-lg-4" style="margin-bottom: 20px;">
                                    <div class="mt-widget-3">
                                        <div class="mt-head blue-sharp"
                                             style="padding-bottom: 100px; margin: 0px !important;">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book" style="padding-right: 10px;"></i> Plan Type
                                                : {{ $p->type }}
                                            </div>

                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-paper-plane" style="padding-right: 10px;"></i> Received
                                                Month : Unlimited
                                            </div>

                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-plus" style="padding-right: 10px;"></i> Received Points
                                                : {{ $p->point }}
                                            </div>


                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-puzzle-piece" style="padding-right: 10px;"></i> Payment
                                                : {{ $p->amount }}
                                            </div>


                                            {{--<div class="mt-head-button">--}}
                                            {{--<a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            @elseif($p->type == 'B')
                                <div class="col-sm-6 col-lg-4" style="margin-bottom: 20px;">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-blue"
                                             style="padding-bottom: 100px; margin: 0px !important;">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book" style="padding-right: 10px;"></i> Plan Type
                                                : {{ $p->type }}
                                            </div>

                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-paper-plane" style="padding-right: 10px;"></i> Received
                                                Month :Unlimited
                                            </div>

                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-plus" style="padding-right: 10px;"></i> Received Points
                                                : {{ $p->point }}
                                            </div>


                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-puzzle-piece" style="padding-right: 10px;"></i> Payment
                                                : {{ $p->amount }}
                                            </div>


                                            {{--<div class="mt-head-button">--}}
                                            {{--<a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-sm-6 col-lg-4" style="margin-bottom: 20px;">
                                    <div class="mt-widget-3">
                                        <div class="mt-head bg-yellow"
                                             style="padding-bottom: 100px; margin: 0px !important;">
                                            <div class="mt-head-icon">
                                                <i class="fa fa-book" style="padding-right: 10px;"></i> Plan Type
                                                : {{ $p->type }}
                                            </div>

                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-paper-plane" style="padding-right: 10px;"></i> Received
                                                Month : {{ $p->multi }}
                                            </div>

                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-plus" style="padding-right: 10px;"></i> Received Points
                                                : Unlimited
                                            </div>


                                            <div class="col-xs-12" style="padding-left: 50px;">
                                                <i class="fa fa-puzzle-piece" style="padding-right: 10px;"></i> Payment
                                                : {{ $p->amount }}
                                            </div>


                                            {{--<div class="mt-head-button">--}}
                                            {{--<a href="{{url('entra/buy_plan/A')}}" type="button" class="btn btn-default btn-sm">Buy </a>--}}
                                            {{--</div>--}}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                    @if(Auth::user()->type ==2)
                        <div class="col-sm-6 col-lg-4">
                            <div class="mt-widget-3">
                                <div class="mt-head bg-blue">
                                    <div class="mt-head-icon">
                                        <i class="fa fa-book"></i> A
                                    </div>
                                    <div class="col-xs-12" style="padding-left:30%;"><i class="fa fa-search"></i>
                                        View Project limit : 20
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>
                                    <div class="col-xs-12" style="padding-left:30%;">
                                        <i class="fa fa-paper-plane"></i> Create Project limit : 40
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>

                                    <div class="col-xs-12" style="padding-left:30%;">
                                        <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : 5
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>

                                    <div class="mt-head-button">
                                        <a href="{{url('entra/buy_plan/A')}}" type="button"
                                           class="btn btn-default btn-sm">Buy </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="mt-widget-3">
                                <div class="mt-head bg-yellow-gold">
                                    <div class="mt-head-icon">
                                        <i class="fa fa-book"></i> B
                                    </div>
                                    <div class="col-xs-12" style="padding-left:30%;"><i class="fa fa-search"></i>
                                        View Project limit : unlimited
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>
                                    <div class="col-xs-12" style="padding-left:30%;">
                                        <i class="fa fa-paper-plane"></i> Create Project limit : unlimited
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>

                                    <div class="col-xs-12" style="padding-left:30%;">
                                        <i class="fa fa-puzzle-piece"></i> Create Business Plan Limit : unlimited
                                    </div>
                                    <div class="row">&nbsp;</div>
                                    <div class="row">&nbsp;</div>

                                    <div class="mt-head-button">
                                        <a href="{{url('entra/buy_plan/B')}}" type="button"
                                           class="btn btn-default btn-sm">Buy </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection