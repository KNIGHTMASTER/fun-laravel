<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Report</div>
 
				<div class="panel-body">
					{!! FORM::open(['url' => '/sendmail', 'method' => 'post']) !!}
                		<div class="box-body">
                			{!! FORM::text('data', null, ['class'=>'form-control', 'placeholder'=>'Enter Data']) !!}
                    		{!! Form::submit('send mail', ['class' => 'btn btn-success']) !!}
                		</div>
                	{!! FORM::close() !!}                	
				</div>
			</div>
		</div>
	</div>
</div>