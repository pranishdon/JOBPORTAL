<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    @vite(['resources/js/app.js'])
</head>
<body>
    <div class="loader"></div>
    <div id="app">
    </div>
    {{$slot}}
</body>
<script src="{{ asset('js/app.min.js')}}"></script>
</html>
