@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ $error }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
@endif
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session()->get('message')}}
        @if (session()->has('link'))
        <a href="{{session()->get('link')}}" class="alert-link">{{ session()->get('link') }}</a>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
