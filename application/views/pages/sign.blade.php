@extends('layouts.master')

@section('content')
    <?php if(\App\Components\Flash\Flash::has('errors')) {; ?>
    <div class="container">
        <div class="row centered-form">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                <ul class="alert-danger">
                    @foreach (\App\Components\Flash\Flash::get('errors') as $k => $errors)
                        @foreach($errors as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <?php } ?>
    <form action="/sign" method="POST" data-toggle="validator">
        <div class="container">
            <div class="row centered-form">
                <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <?php echo \App\Components\Internationalization\Internationalizator::get('Sign In', $lang); ?>
                                <?php echo \App\Components\Internationalization\Internationalizator::get('or', $lang); ?>
                                <a href="/reg" class="btn btn-default">
                                    <?php echo \App\Components\Internationalization\Internationalizator::get('registration', $lang); ?>
                                </a>
                            </h3>
                        </div>
                        <div class="panel-body">
                            <form role="form">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-sm"
                                           required
                                           data-error="Incorrect Email"
                                           placeholder="<?php echo \App\Components\Internationalization\Internationalizator::get('Email', $lang); ?>">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" id="password"
                                           class="form-control input-sm"
                                           required
                                           data-minlength="6"
                                           data-error="Password is too short"
                                           placeholder="<?php echo \App\Components\Internationalization\Internationalizator::get('Password', $lang); ?>">
                                    <div class="help-block with-errors"></div>
                                </div>

                                <input type="submit"
                                       value="<?php echo \App\Components\Internationalization\Internationalizator::get('Sign In', $lang); ?>"
                                       class="btn btn-info btn-block">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection