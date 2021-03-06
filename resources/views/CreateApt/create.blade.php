@extends('layouts.app')
@section('content')
    <link href="{!! asset('css/all.css') !!}" media="all" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="pull-left">
                        <form action="{{ URL::previous() }}" method="GET">{{ csrf_field() }}
                            <button type="submit" id="create-resident" class="btn btn-primary"><i
                                        class="fa fa-btn fa-file-o"></i>Back
                            </button>
                        </form>
                    </div>
                    <div class="panel-heading text-center"> Create Apartment Information</div>
                    <div class="panel-body">

                        {{--<h1></h1>--}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url' => 'apartment']) !!}

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_name', '<span style="color: red;">*</span>Center Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::select('cntr_name', $centers ,null,['placeholder' => 'Please select','class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                            </br> </br>

                            {!! Html::decode(Form::label('apt_floornumber', '<span style="color: red;">*</span>Apartment Floor Number:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::number('apt_floornumber',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                            </br> </br>


                            <div class="form-group">
                                {!! Html::decode(Form::label('apt_number', '<span style="color: red;">*</span>Apartment Number:',['class' => 'col-md-4 control-label'])) !!}
                                <div class="col-md-4">
                                    {!! Form::number('apt_number',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                                </div>
                                </br> </br>
                                <div class="form-group">
                                    <div class="form-group">
                                        {!! Form::label('apt_comments', 'Apartment Comments:',['class' => 'col-md-4 control-label']) !!}
                                        <div class="col-md-4">
                                            {!! Form::textarea('apt_comments',null,['class' => 'col-md-4 form-control','rows' => 4, 'cols' => 60]) !!}
                                        </div>
                                    </div>
                                    </br> </br>
                                    <div class="form-group" style="text-align: center; padding-top: 100px">
                                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}

                                    </div>

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop