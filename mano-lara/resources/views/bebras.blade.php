@extends('layout')

@section('body')
<h1 style="
    color:{{$color}};
    font-size:{{$size}}px;
    ">
    {{$word}}, Bebrai iš konteinerio!
</h1>
@endsection


@section('title', 'Bebrai')

