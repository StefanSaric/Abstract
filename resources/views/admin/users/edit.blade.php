
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
                    <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{__('Uredjivanje korisnika')}}</span></h5>
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
                            {{__('Uredi')}}
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
                                            <h4 class="card-title">{{__('Forma za uredjivanje korisnika')}}</h4>
                                        </div>
                                        <div class="col s12 m6 l6">
                                            <p class='pull-right'></p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    {!! Form::model($user, array('method' => 'POST', 'url' => 'admin/users/update', 'class' => 'form-horizontal form-bordered form-validate', 'role' => 'form', 'novalidate' => 'novalidate', 'files' => true)) !!}
                                    @include('admin.forms.users', ['submit' => 'Uredi'])
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
