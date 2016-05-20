@extends('pages.index.template-index')
@section('content')    
    <div class="col-md-3 center">
		<div class="box box-primary">
        	<div class="box-body box-profile ">
            	<img alt="User profile picture" src={{URL::asset('img/fauzi.jpg')}} class="profile-user-img img-responsive img-circle">
				<h3 class="profile-username text-center">{{$userName}}</h3>
                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered">
                	<li class="list-group-item">
                      <b>Followers</b> <a class="pull-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Following</b> <a class="pull-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="pull-right">13,287</a>
                    </li>
                </ul>

            	<a class="btn btn-primary btn-block" href="#"><b>Follow</b></a>
        	</div>
    	</div>
	</div>
@endsection