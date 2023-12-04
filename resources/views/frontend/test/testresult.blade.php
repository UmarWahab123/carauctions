<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Enneagram Personality Test">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enneagram Personality Test</title>
     <link rel="stylesheet" href="{{asset('css/vue.css')}}">
     <link rel="stylesheet" href="{{asset('css/result_vue.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/images/new_logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">


</head>
<body>
<div id="app">
<!-- <main-test></main-test> -->
<router-view></router-view>
</div>
<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
