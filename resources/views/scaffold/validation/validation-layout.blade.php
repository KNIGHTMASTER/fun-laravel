@if($errors->has())
    @if($errors->any())
        <div class="callout callout-danger">
            <h4>Warning!</h4>
            @foreach($errors->all() as $error)
                <p>{!! $error !!}</p>
            @endforeach
        </div>
    @endif
@endif