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
                    <div class="panel-heading text-center"> Create New Resident</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors-> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(['url' => 'resident']) !!}
                        <input type="hidden" name="_token" value="{{ Session::token() }}">

                        <div class="form-group">
                            {!! Html::decode(Form::label('res_pccid', '<span style="color: red;">*</span>PCCID:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_pccid',null,['class'=>'form-control','required' => 'required']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('res_fname', '<span style="color: red;">*</span>First Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_fname',null,['class'=>'form-control','required' => 'required']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('res_mname', 'Middle Name:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_mname',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('res_lname', '<span style="color: red;">*</span>Last Name:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_lname',null,['class'=>'form-control','required' => 'required']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::Label('res_gender', '<span style="color: red;">*</span>Gender:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {{ Form::select('res_gender', [
                                    'Male' => 'Male',
                                    'Female' => 'Female'], old('res_gender'), ['class' => 'form-control']) }}
                            </div>
                        </div>

                        </br> </br>
                        <div class="form-group">
                            {!! Form::label('res_homephone', 'Home Phone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_homephone',null,['id' => 'home','class'=>'form-control']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('res_cellphone', 'Cellphone:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_cellphone',null,['id' => 'mobile','class'=>'form-control']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('res_email', 'Email:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::text('res_email',null,['class'=>'form-control']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Form::label('res_comment', 'Comment:',['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                {!! Form::textarea('res_comment',null,['class'=>'col-md-4 form-control', 'rows'=>'1']) !!}
                            </div>
                        </div>

                        </br> </br>

                        <div class="form-group">
                            {!! Html::decode(Form::Label('res_status', '<span style="color: red;">*</span>Status:',['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-4">
                                {!! Form::select('res_status', [
                                            'Active' => 'Active',
                                            'Inactive' => 'Inactive'], old('res_status'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <br><br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('cntr_name', '<span style="color: red;">*</span>Center Name:', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-6">
                                {{ Form::select('cntr_name', array_merge([0 => 'Select']) + $centers, 'default',
                                   array('id' => 'center_drop', 'class' => 'col-md-4')) }}
                            </div>
                        </div>

                        <br><br>

                        <div class="form-group">
                            {!! Html::decode(Form::label('apt_number', '<span style="color: red;">*</span>Apartment Number:', ['class' => 'col-md-4 control-label'])) !!}
                            <div class="col-md-6">
                                {{ Form::select('apt_number', array_merge([0 => 'Select']), 'default',
                                    array('id' => 'apartment_drop', 'class' => 'col-md-4')) }}
                            </div>
                        </div>

                        <br><br>

                        <div class="form-group" style="text-align: center">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

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

        $(document).ready(function () {
            $('#home').mask('(000) 000-0000', {placeholder: "(___) ___-____"});
        });

        $('#home').blur(function () {
            var input = $(this);
            if (input.val().length > 0 && input.val().length < 14) {
                alert('Please enter correct phone number, else leave blank');
                setTimeout(function () {
                    $(input).focus();
                }, 1);
            }
        });

        $('#center_drop').change(function () {

            // var selectedCenterIndex;
            data = {option: $(this).val()};

//        console.log("Data drop down is !!" + data);

            selectedCenterIndex = data;
            //Apartment fetch
            $.get("/getAptDetailRes", data, function (data) {

                //      console.log(data);
                var apartment_data = $('#apartment_drop');
                $("#apartment_drop").empty();

                apartment_data.append($("<option></option>")
                    .attr("value", 0)
                    .text("Please Select"));

                $.each(data, function (key, value) {
                    apartment_data.append($("<option></option>")
                        .attr("value", key)
                        .text(value));
                });
                $('#apartment_drop').val(0).change();
            });
        });
    </script>
@endsection


