@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">File</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> {{Lang::get("messages.uploaderror")}}<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{ Form::open(array('route'=>'file-upload','files'=>true)) }}
                        {{ Form::text('name','',array('placeholder'=>'Name')) }}
                        <br/><br/>
                        {{Form::select('tank',$tanks)}}
                        <br/><br/>
                        {{ Form::file('file','',array('id'=>'','class'=>'')) }}
                        <br/>
                        <!-- submit buttons -->
                        {{ Form::submit('Save',array('id'=>'save','class'=>'btn btn-primary')) }}

                        <!-- reset buttons -->
                        {{ Form::reset('Reset',array('id'=>'','class'=>'btn btn-primary')) }}

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection