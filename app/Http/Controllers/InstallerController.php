<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class InstallerController extends Controller
{
    public function install(Request $request)
    {
        $projectName = $request->input('project_name');
        $dbHost = $request->input('db_host');
        $dbName = $request->input('db_name');
        $dbUser = $request->input('db_user');
        $dbPass = $request->input('db_pass');

        $command = "composer create-project --prefer-dist laravel/laravel $projectName " .
            "--database=mysql --dbhost={$dbHost} --dbname={$dbName} " .
            "--dbuser={$dbUser} --dbpass={$dbPass}";

        // Run the command in a new process
        // $process = Process::fromShellCommandline($command);
        // $process->run();

        // Check if the command executed successfully
        // if (!$process->isSuccessful()) {
        //     // Handle project creation failure
        //     $error = 'Failed to create the Laravel project. Please check your installation environment.';
        //     throw new \Exception($error);
        // }
            return view('install');
            // return response()->json(['progress' => 100]);


    }
}
