@extends('radiusweb::layouts.app')

@section('leftcolumn')
    @if(Auth::check())
    <p>
       <a href="{{route('showcdr')}}">CDR</a>
       <a href="{{route('showrate')}}">Rate</a>
    </p>
    @endif
@endsection
@section('content')
<div id=rate>
    {{ Form::open(array('url' => 'rate')) }}
    <p>
        @if($errors != null)    
            {{ $errors->first('ratefile') }}
        @endif
        {{ Form::file('ratefile') }}
        {{ Form::submit('Import') }}
    </p>
    {{ Form::close() }}
    
    {{ Form::open(array('url' => 'rate', 'method' => 'GET')) }}
    <h1>Rate</h1>

    <p>
        {{ Form::label('CC', 'CC') }}
        {{ Form::label('AC', 'AC') }}
        {{ Form::label('CAC', 'CAC') }}
        {{ Form::label('Country', 'Country') }}
        {{ Form::label('Time Uint', 'Time Uint') }}
        {{ Form::label('Rate', 'Rate') }}
    </p>
    
    <p>
        @foreach( $rates as $rate)
        {{ Form::label('CC', $rate->cc) }}
        {{ Form::label('AC', $rate->ac) }}
        {{ Form::label('CAC', $rate->cac) }}
        {{ Form::label('Country', $rate->country) }}
        {{ Form::label('Time Unit', $rate->timeunit) }}
        {{ Form::label('Rate', $rate->rate) }}
        @endforeach
    </p>    
    {{ Form::close() }}
</div>
@endsection
