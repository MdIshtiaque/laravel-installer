@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center animate__animated animate__fadeInDown">
                <h1>Welcome to the Installer</h1>
                <p>Thank you for choosing our application. Please follow the steps below to install it.</p>
                <a href="{{ route('installer.database') }}" class="btn btn-primary btn-lg">Start Installation</a>
            </div>
        </div>
    </div>
@endsection
