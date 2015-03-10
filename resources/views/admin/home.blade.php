@extends('app')

@section('css')
   {{HTML::style('css/admin.css')}}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        {{Lang::get("admin.members")}}
                        <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Users"/>
                    </div>
                    <div id="members">
                        <table id="dev-table" class="table table-striped table-hover">
                            <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            </thead>
                            @foreach(\App\User::all() as $user)
                                <tr class="clickable-row clickable" data-href="{{URL::to(App::getLocale()."/admin/tanks/".$user->id)}}">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->role}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{HTML::script('js/admin.js')}}
@endsection