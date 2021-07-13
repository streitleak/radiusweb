@extends('radiusweb::layouts.app')

@section('leftcolumn')
    @if(Auth::check())
    <p>
       <a href="{{route('showcdr')}}">CDR</a>
    </p>
    @endif
@endsection

@section('content')
<div id=profile>
    {{ Form::open(array('url' => 'profile')) }}
    <h1>Profile</h1>

    <p>
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $name) }}
    </p>
    
    <p>
        {{ Form::label('email', 'Email Address') }}
        {{ Form::text('email', $email) }}
    </p>    
    
    <p>{{ Form::submit('Submit!') }}</p>
    {{ Form::close() }}
</div>
@endsection