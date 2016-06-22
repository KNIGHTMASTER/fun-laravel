@extends('pages.index.template-index')
@section('content')    
<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Download Report Company</div>
 
				<div class="panel-body">
					{!! FORM::open(['url' => '/report-company']) !!}
                		<div class="box-body">
                    		{!! Form::submit('Download', ['class' => 'btn btn-success']) !!}
                		</div>
                	{!! FORM::close() !!}
				</div>
			</div>
</div>
@endsection