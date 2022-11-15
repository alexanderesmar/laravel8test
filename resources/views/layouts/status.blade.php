
{{--
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('status') }} status-box">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        {{ Session::get('message') }}
    </div>
@endif
 --}}

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
    {{ Session::get('message') }}
</div>
@endif
