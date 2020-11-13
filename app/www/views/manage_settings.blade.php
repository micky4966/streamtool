@extends('main')
@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Settings</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                @if($message)
                    <div class="alert alert-{{ $message['type'] }}">
                        {{ $message['message'] }}
                    </div>
                @endif
                <br>
                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" role="form" action="" method="post">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Path to ffmpeg binary: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12"  name="ffmpeg_path" value="{{  isset($_POST['ffmpeg_path']) ?  $_POST['ffmpeg_path'] : $setting->ffmpeg_path}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Path to ffprobe binary<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12"  name="ffprobe_path" value="{{  isset($_POST['ffprobe_path']) ?  $_POST['ffprobe_path'] : $setting->ffprobe_path}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Custom IP/DNS: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" name="webip" value="{{  isset($_POST['webip']) ?  $_POST['webip'] : $setting->webip}}">
                        </div>
                        Example: mystreams.com, 192.168.1.24 )
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Custom Streaming Port: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" name="webport" value="{{  isset($_POST['webport']) ?  $_POST['webport'] : $setting->webport}}">
                            <span class="label label-important">Attention : need service restart: systemctl restart streamtool</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">HLS Ouput Folder: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" name="hlsfolder" value="{{  isset($_POST['hlsfolder']) ?  $_POST['hlsfolder'] : $setting->hlsfolder}}">
                            <span class="label label-important">Set absolute path of hls folder.</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Logo Repository URL:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" name="logourl" value="{{  isset($_POST['logourl']) ?  $_POST['logourl'] : $setting->logourl}}">
                        </div>
                        (Base URL of logos repo) Ex: http://example.com/logo/
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">User Agent <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control col-md-7 col-xs-12" name="user_agent" value="{{  isset($_POST['user_agent']) ?  $_POST['user_agent'] : $setting->user_agent}}">
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="submit" class="btn btn-success">Submit</button>
                        </div>
                        <button class="btn btn-danger" href="settings?patchnv" title="Patch Nvidia encoder limit" onclick="return confirm('Are you sure?')">Patch Nvidia encoder limit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

