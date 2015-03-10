@extends('app')

@section('css')

@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				@foreach(Auth::user()->tanks as $tank)
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">

						<!-- PRICE ITEM -->
						<div class="panel price panel-primary">
							<div class="panel-heading  text-center">
								<h3>{{$tank->tanksort}}</h3>
							</div>
							<!--<div class="panel-body tankbody">
                            {{HTML::image('img/tank2.png')}}
                        </div>-->
							<div class="panel-footer">
								<a class="btn btn-lg btn-block btn-danger" href="{{URL::to(App::getLocale()."/tankdetail/".$tank->id)}}">SELECT!</a>
							</div>
						</div>
						<!-- /PRICE ITEM -->
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
@section('scripts')

@endsection