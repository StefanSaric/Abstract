
@extends('admin.layouts.layout')

@section('vendorCss')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('vendors/select2/select2-materialize.css')}}"/>
@stop
@section('pageCss')
<link rel="stylesheet" type="text/css" href="{{asset('css/users-form.css')}}"/>
@stop
    
@section('content')
<div class="row">
    <div id="breadcrumbs-wrapper" data-image="{{asset('images/breadcrumb-bg.jpg')}}">
        <!-- Search for small screen-->
        <div class="container">
            <div class="row">
                <div class="col s12 m6 l6">
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Korisnici')}}</span></h5>
                </div>
                <div class="col s12 m6 l6 right-align-md">
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/') }}">Dash</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/users') }}">{{__('Korisnici')}}</a>
                        </li>
                        <li class="breadcrumb-item">
                            {{__('Dodaj')}}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12">
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col s12">
                        <div id="clendar" class="card">
                            <div class="card-content">
                                <div class="card-title">
                                    <div class="row">
                                        <div class="col s12 m6 l6">
                                            <h4 class="card-title">{{__('Forma za dodavanje korisnika')}}</h4>
                                        </div>
                                        <div class="col s12 m6 l6">
                                            <p class='pull-right'></p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    {!! Form::open(array('method' => 'POST', 'url' => 'admin/users/store', 'id' => 'fileupload', 'class' => 'form-horizontal form-bordered form-validate', 'role' => 'form', 'files' => true, 'enctype' => 'multipart/form-data')) !!}
                                    @include('admin.forms.users', ['submit' => 'Dodaj'])
                                    {!! Form::close() !!}
                                    @include('admin.forms.error')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                      
</div>
@stop

@section('vendorScripts')
<script src="{{ asset('vendors/jquery-validation/jquery.validate.js') }}"></script>
<script src="{{ asset('vendors/select2/select2.full.min.js') }}"></script>	
@stop
@section('pageScripts')
<script src="{{ asset('js/users-form.js') }}"></script>
@stop