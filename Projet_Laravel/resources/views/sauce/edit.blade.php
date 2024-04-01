@extends('base')

@section('title', "Modifier la sauce : $sauce->name")

@section('content')
    @include('sauce.form')
@endsection
