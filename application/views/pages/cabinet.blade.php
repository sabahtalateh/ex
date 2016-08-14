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

    <div class="row">
        <div class="panel-body">
            <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
            <h2>Username - {{ $user->username }}</h2>
            <h2>Email - {{ $user->email }}</h2>
            <h2>Avatar - <img width="300px" src="{{ $user->avatar }}" /></h2>

            <form action="/upload" method="post" enctype="multipart/form-data">
                Select image to upload:
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="submit" value="Upload Image" name="submit">
            </form>

        </div>
    </div>
@endsection