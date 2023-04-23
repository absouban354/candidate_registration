@props(['status','meetings'])
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark status-navbar">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @foreach ($status as $item)
          <li class="nav-item me-1">
            @if (isset($item->deals_count))
              <a class="nav-link {{(((!request()->getQueryString()) && $item->id==1) || str_contains(request()->getQueryString(),'status='.$item->id))?'active':''}}" href="/{{basename(request()->url())}}?status={{$item->id}}">{{$item->name}} ({{$item->deals_count}})</a>
            @else
              <a class="nav-link {{(str_contains(request()->getQueryString(),'status='.$item->id))?'active':''}}" href="/{{basename(request()->url())}}?status={{$item->id}}">{{$item->name}} ({{$item->leads_count}})</a>
            @endif
          </li>  
          @endforeach
      </ul>
      @if (!isset($meetings) && !$meetings->isEmpty())
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item me-1 dropdown">
          <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Meetings Today
          </button>        
          
        </li>
      </ul>
      <div class="collapse position-absolute top-100 end-0" id="collapseExample">
        <div class="card card-body">
          <ul class="list-group">
            @foreach ($meetings as $item)
                <li class="list-group-item"><a class="link-dark" href="/leads/{{$item->id}}">{{$item->lead_name}} - {{$item->next_meeting_datetime}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
    </div>
  </div>
</nav>