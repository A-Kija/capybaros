@extends('layout')

@section('body')


<h1>Now is: {{$count}} Squares</h1>


<form action="{{route('do-squares')}}" method="post">
    <input type="text" name="count">
    <button type="submit">Create Squares</button>
    @csrf
</form>

@endsection

@section('title', 'Magic Squares')