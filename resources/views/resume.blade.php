<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Blank Developer</title>

    <link rel="stylesheet" href="{{ url('/') }}/css/reset.css">
    <link rel="stylesheet" href="{{ url('/') }}/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
    <style>


        @font-face {
            font-family: "PlayBold";
            src: url("{{ url('/') }}/fonts/PlayBold.eot");
            src: url("{{ url('/') }}/fonts/PlayBold.eot?#iefix")format("embedded-opentype"),
            url("{{ url('/') }}/fonts/PlayBold.woff") format("woff"),
            url("{{ url('/') }}/fonts/PlayBold.ttf") format("truetype");
            font-style: normal;
            font-weight: normal;
        }
    </style>
</head>
<body>

@include('parts.pages1')
<?php $work_expirience = array_chunk($data['work_expirience'], 2, true); ?>
@foreach($work_expirience as $data_expirience)
    @include('parts.pages2')
@endforeach
<?php $lang_tools_techs = array_chunk($data['languages_tools_technologies'], 2, true); ?>
@foreach($lang_tools_techs as $languages_tools_technologies)
    @include('parts.pages3')
@endforeach

</body>
</html>