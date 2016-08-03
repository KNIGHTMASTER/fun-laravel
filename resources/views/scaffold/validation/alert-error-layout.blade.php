@if($errors->has())
    @if($errors->any())
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-ban"></i>Error</h4>
            @foreach($errors->all() as $error)
                <p>{!! $error !!}</p>
            @endforeach
        </div>
    @endif
@endif