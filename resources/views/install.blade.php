@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1>Installation Progress</h1>
                <div class="progress mt-4 mb-4">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
                <p id="progress-message">Installing...</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Function to update the progress bar
        function updateProgressBar(progress) {
            const progressBar = document.getElementById('progress-bar');
            const progressMessage = document.getElementById('progress-message');

            progressBar.style.width = progress + '%';
            progressBar.setAttribute('aria-valuenow', progress);
            progressMessage.innerText = `Installing... ${progress}%`;

            // If progress reaches 100, redirect to the completion page
            if (progress === 100) {
                setTimeout(() => {
                    window.location.href = "{{ route('installer.complete') }}";
                }, 1000);
            }
        }

        // Function to start the installation process
        function startInstallation() {
            // Perform an Ajax request to the install route
            axios.post("{{ route('installer.install') }}")
                .then(response => {
                    const progress = response.data.progress;

                    // Update the progress bar
                    updateProgressBar(progress);

                    // Call the function recursively until progress reaches 100
                    if (progress < 100) {
                        startInstallation();
                    }
                })
                .catch(error => {
                    // Handle the error if installation fails
                    console.error(error);
                    alert("Installation failed. Please try again.");
                });
        }

        // Start the installation process when the page loads
        window.onload = startInstallation();
    </script>
@endpush
