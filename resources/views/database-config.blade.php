@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h1>Database Configuration</h1>
                <p>Please provide the following database details:</p>

                <form method="POST" action="{{ route('installer.install') }}">
                    @csrf

                    <div class="form-group">
                        <label for="project_name">Project Name</label>
                        <input type="text" class="form-control" id="project_name" name="project_name" required>
                    </div>
                    <div class="form-group">
                        <label for="db_host">Database Host</label>
                        <input type="text" class="form-control" id="db_host" name="db_host" required>
                    </div>
                    <div class="form-group">
                        <label for="db_name">Database Name</label>
                        <input type="text" class="form-control" id="db_name" name="db_name" required>
                    </div>
                    <div class="form-group">
                        <label for="db_user">Database User</label>
                        <input type="text" class="form-control" id="db_user" name="db_user" required>
                    </div>
                    <div class="form-group">
                        <label for="db_pass">Database Password</label>
                        <input type="password" class="form-control" id="db_pass" name="db_pass">
                    </div>

                    <button type="submit" class="btn btn-primary">Install</button>
                </form>
            </div>
        </div>
    </div>
@endsection
