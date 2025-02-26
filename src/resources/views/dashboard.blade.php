@extends('radiusweb::layouts.app')


@section('navigation')

@endsection

@section('leftcolumn')
    @if(Auth::check())
    <p>
        <ul>
		    <li><a href="{{route('showcdr')}}">CDR</a></li>
            <li><a href="{{route('showrate')}}">Rate</a></li>
		</ul>
    </p>
    @endif
@endsection

@section('content')
<div class="stgrid">
	<div>
		<div class="css_table">
			<div class="css_tr">
				<div class="css_td">
				Last 30 days Calls
				</div>
				<div class="css_td">
				{{ $cdr_0 }}
				</div>
			</div>
			<div class="css_tr">
				<div class="css_td">
				Last 30 days Calls (Call Duration > 0)
				</div>
				<div class="css_td">
				{{ $cdr_1 }}
				</div>
			</div>
			<div class="css_tr">			
				<div class="css_td">
				</div>
				<div class="css_td">
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="css_table">
			<div class="css_tr">
				<div class="css_td">
				Gateways
				</div>
				<div class="css_td">
				Calls
				</div>
			</div>
			@if ($gateways != null )
			@foreach( $gateways as $gateway)
			<div class="css_tr">
				<div class="css_td">
				<a href="{{ route("showgwcdr", ['gateway' => $gateway['nasipaddress']]) }}"> {{  $gateway['nasipaddress'] }} </a>
				</div>
				<div class="css_td">
				{{ $gateway['calls'] }}
				</div>
			</div>
			@endforeach
			@else
			<div class="css_tr">
				<div class="css_td">
				</div>
				<div class="css_td">
				</div>
			</div>
			@endif
			
		</div>
	</div>
	<div>
	</div>
	<div>
	</div>
</div>
<style type="text/css">
.stgrid .css_table {
      width: 100%;
      display:table;
  }
.stgrid .css_tr {
      display: table-row;
  }
.stgrid .css_td {
      display: table-cell;
  }
.stgrid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-template-rows: repeat(2, 1fr);
    grid-gap: 3px;
	background: gray;
	padding: 3px;
	height: calc(100% - 6px);
	width: calc(100% - 6px);
}
.stgrid > div {
    background: #33CCFF;
}  
</style>
@endsection