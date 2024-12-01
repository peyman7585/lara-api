@if(session('success'))
    <div class="alert alert-success">
       {{session('success')}}
    </div>
@endif
@if(session('failed'))
    <div class="alert alert-danger">
        {{session('failed')}}
    </div>
@endif

@if(session('emailHasVerify'))
    <div class="alert alert-success text-center">
        @lang('auth.email has verify')
    </div>
@endif
