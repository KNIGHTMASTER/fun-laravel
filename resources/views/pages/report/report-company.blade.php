@extends('pages.index.template-index')
@section('content')    
<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Download Report Company</div>
 
				<div class="box-body">
					<div class="row">
						{!! FORM::open(['url' => '/report-company-pdf']) !!}
                			<div class="col-xs-1">
	                    		{!! Form::submit('PDF', ['class' => 'btn btn-success']) !!}
                			</div>
                		{!! FORM::close() !!}

                		{!! FORM::open(['url' => '/report-company-xls']) !!}
                		<div class="col-xs-1">
                    		{!! Form::submit('EXCEL', ['class' => 'btn btn-success']) !!}
                		</div>
                		{!! FORM::close() !!}                		
					</div>
				</div>
			</div>
</div>
@endsection