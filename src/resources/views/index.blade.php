@extends('radiusweb::layouts.app')


@section('navigation')

@endsection

@section('leftcolumn')
    @if(Auth::check())
    <p>
        <a href="{{route('showcdr')}}">CDR</a>
        <a href="{{route('showrate')}}">Rate</a>
    </p>
    @endif
@endsection

@section('content')

@endsection