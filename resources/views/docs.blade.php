@extends('default')

@section('content')
<div>
	@include('partials.sidebar')
	
	<div class="documentation is-{{ config('larecipe.ui.code_theme') }}" :class="{'expanded': ! sidebar}">
		{!! $content !!}
	</div>
</div>
@endsection
