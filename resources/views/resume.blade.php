@extends('layouts.app')

@include('parts.pages1')
<?php $work_expirience = array_chunk($data['work_expirience'], 2, true); ?>
@foreach($work_expirience as $data_expirience)
    @include('parts.pages2')
@endforeach
<?php $lang_tools_techs = array_chunk($data['languages_tools_technologies'], 2, true); ?>
@foreach($lang_tools_techs as $languages_tools_technologies)
    @include('parts.pages3')
@endforeach
