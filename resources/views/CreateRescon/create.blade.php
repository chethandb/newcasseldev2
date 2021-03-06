@extends('layouts.app')
<head xmlns="http://www.w3.org/1999/html">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
</head>
@section('content')
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
                    <div class="panel-heading text-center"> Create Resident Contact Information</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {!! Form::open(['url' => 'rescontact']) !!}
                        <div class="form-group">

                            {!! Html::decode(Form::label('con_fname', '<span style="color: red;">*</span>Contact First Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_fname',null,['class' => 'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('con_mname', 'Contact Middle Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_mname',null,['class' => 'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">

                            {!! Html::decode(Form::label('con_lname', '<span style="color: red;">*</span>Contact Last Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_lname',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">

                            {!! Html::decode(Form::label('con_relationship', '<span style="color: red;">*</span>Relationship:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_relationship',null,['class'=>'col-md-4 form-control','required' => 'required']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('con_cellphone', 'Cellphone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_cellphone',null,['id' => 'mobile','class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>
                        <div class="form-group">
                            {!!Form::label('con_email', 'Email:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('con_email',null,['class'=>'col-md-4 form-control']) !!}
                            </div>
                        </div>
                        </br> </br>


                        <div class="form-group">
                            {!!Form::label('con_comment', 'Comment:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::textarea('con_comment',null,['class'=>'col-md-4 form-control', 'rows'=>'1']) !!}
                            </div>
                        </div>
                        </br> </br>


                        <div class="form-group">

                            {!! Html::decode(Form::label('con_gender', '<span style="color: red;">*</span>Gender:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {{ Form::select('con_gender', [
                                'Male' => 'Male',
                                'Female' => 'Female'], old('con_gender'), ['class' => 'form-control']) }}
                            </div>
                        </div>
                        </br> </br>

                        {!! Html::decode(Form::label('res_fullname', '<span style="color: red;">*</span>ResidentName:', ['class' => 'col-md-2 control-label'])) !!}
                        <div style="padding-left: 15px">
                            {{ Form::select('res_fullname[]', $residents,
                              'default', array('id' => 'residents[]', 'multiple'=>'multiple', 'style' =>'width:75%')),['class'=>'col-md-4 form-control','required' => 'required'] }}
                        </div>

                        </br> </br>
                        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function ($) {
            $('select').select2();


            $("#residents").select2({
                placeholder: "Please Select",
                tags: true
            })
        });

        $(document).ready(function () {
            $('#mobile').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
        });

        $('#mobile').blur(function () {
            var input = $(this);
            if (input.val().length > 0 && input.val().length < 14) {
                alert('Please enter correct phone number, else leave blank');
                setTimeout(function () {
                    $(input).focus();
                }, 1);
            }
        });

    </script>
@endsection