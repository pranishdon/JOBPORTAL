<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Job Portal</title>
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="loader"></div>
    <div id="app">
    {{ $slot}}
    </div>
</body>
<script src="{{ asset('js/app.min.js')}}"></script>
</html>

