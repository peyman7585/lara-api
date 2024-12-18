@extends('layouts.app')
@section('title',__('auth.user register'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.alerts')
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <form method="post" action="{{route('store.register')}}">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="email">@lang('auth.email')</label>
                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="email" value=""
                                       aria-describedby="emailHelp" placeholder="@lang('auth.enter your email')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="name">@lang('auth.name')</label>
                            <div class="col-sm-9">
                                <input value="" type="text" name="name" class="form-control" id="name"
                                       placeholder="@lang('auth.enter your name')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="password">@lang('auth.password')</label>
                            <div class="col-sm-9">
                                <input  type="password" name="password" class="form-control" id="password"
                                        placeholder="@lang('auth.enter your password')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="password_confirmation">@lang('auth.confirm password')</label>
                            <div class="col-sm-9">
                                <input  type="password" name="password_confirmation" class="form-control"
                                        id="password_confirmation" placeholder="@lang('auth.confirm your password')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" for="phone_number">@lang('auth.phone number')</label>
                            <div class="col-sm-9">
                                <input value="{{old('phone_number')}}" name="phone_number" type="tel" class="form-control" id="phone_number"
                                       placeholder="@lang('auth.enter your phone number')">
                            </div>
                        </div>
                        <div class="offset-sm-3">
                            @include('partials.validations-errors')
                        </div>
                        <button type="submit" class="btn btn-primary">@lang('auth.register')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
