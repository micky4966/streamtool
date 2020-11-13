@extends('main')
@section('content')
<!-- top tiles -->
<div class="row tile_count" onclick="document.location = 'streams.php?running=1'" style="cursor:pointer">
    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fas fa-volume-up"></i></i> Online streams</span>
            <div class="count">{{ $online }}</div>
        </div>
    </div>
    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count" onclick="document.location = 'streams.php?running=2'" style="cursor:pointer">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fas fa-volume-mute"></i> Offline streams</span>
            <div class="count">{{ $offline }}</div>
        </div>
    </div>
    <div class="animated flipInY col-md-4 col-sm-4 col-xs-4 tile_stats_count" onclick="document.location = 'streams.php'" style="cursor:pointer">
        <div class="left"></div>
        <div class="right">
            <span class="count_top"><i class="fas fa-rss"></i> Total streams</span>
            <div class="count green">{{ $all }}</div>
        </div>
    </div>


</div>
<!-- /top tiles -->



<div class="row">


    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel tile">
            <div class="x_title">
                <h2>SYSTEM INFORMATIONS</h2>
            </div>
            <div class="x_content">
                <h4>Hardware Resources:</h4>
                <div class="widget_summary">
                    <div class="w_left w_25">
                        <span>STORAGE</span>
                    </div>
                    <div class="w_center w_55">
                        <div class="progress">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $space['pr'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $space['pr'] }}%;">

                            </div>
                        </div>
                    </div>
                    <div class="w_right w_20">
                        <span>{{ round(( $space['count'] / 1024 ),2) }} / {{ round(( $space['total'] / 1024 ),2) }}GB</span>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="widget_summary">
                    <div class="w_left w_25">
                        <span>CPU LOAD</span>
                    </div>
                    <div class="w_center w_55">
                        <div class="progress">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $cpu['pr'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $cpu['pr'] }}%;">

                            </div>
                        </div>
                    </div>
                    <div class="w_right w_20">
                        <span>{{ $cpu['pr'] }} %</span>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="widget_summary">
                    <div class="w_left w_25">
                        <span>MEMORY USAGE</span>
                    </div>
                    <div class="w_center w_55">
                        <div class="progress">
                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="{{ $mem['pr'] }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $mem['pr'] }}%;">
                            </div>
                        </div>
                    </div>
                    <div class="w_right w_20">
                        <span>{{ round(( $mem['count'] / 1024 /1024 ),2) }} / {{ round(( $mem['total'] / 1024 /1024 ),2) }}GB</span>
                    </div>
                    <div class="clearfix"></div>
                </div>
                
            </div>
            @php
            if ( $gpupresent ) {
            echo '<div class="x_content">
                <div class="x_title">
                    <h2>GPUs INFORMATIONS</h2>
                </div>';
                for ($i = 0; $i < count($gpuinfos); $i++){ 
                    echo '
                    <h4>GPU ' . $i . ' - ' . $gpuinfos[$i]['cardname'] . '</h4>
                        <div class="widget_summary">
                            <div class="w_left w_25">
                                <span>GPU UTILIZATION</span>
                            </div>
                            <div class="w_center w_55">
                                <div class="progress">
                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="' . $gpuinfos[$i]['gpuutil'] . '" aria-valuemin=" 0"aria-valuemin="0" aria-valuemax="100" style="width: ' .$gpuinfos[$i]['gpuutil'] . '%"></div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                            <div class="w_right w_20">
                                <span>' . $gpuinfos[$i]['gpuutil'].'%</span>
                            </div>
                        </div>
                        </div>';
                    }
                    echo '</div>'; 
                }
            @endphp 
                    </div> 
                </div> 
            </div>
            @endsection