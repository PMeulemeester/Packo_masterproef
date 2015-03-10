@extends('app')
@section('css')
    {{HTML::style('css/oculusViewer.css')}}
    {{HTML::style('css/TimeCircles.css')}}
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.0/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h4><button id="prevdate" class="btn btn-primary"><i class="glyphicon glyphicon-triangle-left"></i></button>
                            <input type="text" class="input-lg" id="datepicker" value="{{ date("d M Y") }}" readonly/>
                            <button id="nextdate" class="btn btn-primary"><i class="glyphicon glyphicon-triangle-right"></i></button>
                            <div class="pull-right"><input id="panelchecker" type="checkbox" checked data-toggle="toggle"></div>
                        </h4>

                    </div>
                    <div class="panel-heading" id="detailpanel">
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" id="cdtimer">
                                Next update
                                <h3 id="waiting" style="display: none;">Waiting for update...</h3>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                Latest file update => {{$usertankinfo->filename}}
                                </br>
                                Version => {{$usertankinfo->versie}}
                            </div>
                            @if((1800-\Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$usertankinfo->updated_at)->diffInSeconds(\Carbon\Carbon::now()))<0)
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <div class="panel panel-danger">
                                        <div class="panel-heading  text-center">
                                            <h3>Errors</h3>
                                        </div>
                                        <div class="panel-body">
                                            No new version available
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                                    <div class="panel panel-success">
                                        <div class="panel-heading  text-center">
                                            <h3>Success</h3>
                                        </div>
                                        <div class="panel-body">
                                            Everything ok
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="panel-body">
                        <div id="oculusviewer">
                            <table id="oculustable" class="table table-striped" userid="{{$user->id}}" tankid="{{$tankid}}">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{HTML::script('js/TimeCircles.js')}}
    {{HTML::script('js/oculusviewer.js')}}
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
@endsection