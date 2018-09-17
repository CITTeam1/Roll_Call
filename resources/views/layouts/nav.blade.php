<nav class="navbar navbar-expand-sm fixed-top">
  <a class="navbar-brand" href="{{url('http://apps.campus.bpcc.edu/')}}"><img src="/pictures/bpcc_logo.png" alt="BPCC" style="width: 40px; height: 40px;"></a>

  @if (Auth::guest())

  @else




    <div class="collapse navbar-collapse" id="navbarText">
    <ul class="nav mr-auto">
      @if(Auth::user()->view_ad_adjuncts == 'Y') <li class="nav-item"><a href="{{url('adjunct/view')}}" class="nav-link {{Request::is('adjunct/view') ? 'active' : '' }}">Active Directory</a></li> @endif


      @if(Auth::user()->add_adjuncts == 'Y') <li class="nav-item"><a href="{{url('adjunct/ad/search')}}" class="nav-link">Add New Account For Adjunct</a></li> @endif


      @if(Auth::user()->add_adjuncts == 'Y') <li class="nav-item {{Request::is('/adjunct/search') ? 'active' : '' }}"><a href="{{url('adjunct/other/search')}}" class="nav-link">Add New Account For Staff and Faculty</a></li> @endif
      @if(Auth::user()->view_hr_dates == 'Y') <li class="nav-item {{Request::is('/adjunct/hrdate') ? 'active' : '' }}"><a href="{{url('adjunct/hrdate')}}" class="nav-link">Edit HR Dates</a></li> @endif
      <!--<li class="nav-item {{Request::is('/adjunct/contracts/users') ? 'active' : '' }}"><a href="{{url('/adjunct/contracts/users')}}" class="nav-link">Add Non-AD Employee</a></li>-->
    
     
    
    @if(Auth::user()->view_contracts == 'Y' || Auth::user()->view_pend_contracts == 'Y' || Auth::user()->view_signed_contracts == 'Y' || Auth::user()->view_accept_contracts == 'Y' || Auth::user()->view_accept_contracts == 'Y' || Auth::user()->view_cancel_contracts == 'Y' || Auth::user()->view_void_contracts == 'Y')
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">View Contracts</a>
      <div class="dropdown-menu">
        @if(Auth::user()->view_contracts == 'Y') <a href="{{url('/adjunct/contracts/users')}}" class="dropdown-item">View All Contracts</a><div class="dropdown-divider"></div> @endif
         
          @if(Auth::user()->view_pend_contracts == 'Y') <a href="{{url('/adjunct/contracts/pending')}}" class="dropdown-item">View Pending Contracts</a> @endif
          @if(Auth::user()->view_signed_contracts == 'Y')<a href="{{url('/adjunct/contracts/signed')}}" class="dropdown-item">View Signed Contracts</a> @endif
          @if(Auth::user()->view_accept_contracts == 'Y') <a href="{{url('/adjunct/contracts/accepted')}}" class="dropdown-item">View Accepted Contracts</a> @endif
          @if(Auth::user()->view_cancel_contracts == 'Y')<a href="{{url('/adjunct/contracts/canceled')}}" class="dropdown-item">View Canceled Contracts</a> @endif
          @if(Auth::user()->view_void_contracts == 'Y') <a href="{{url('/adjunct/contracts/voided')}}" class="dropdown-item">View Voided Contracts</a> @endif
      </div>
    </li>
    @endif
    </ul>
    <ul class="navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu dcustom" role="menu">
              <li>
                <a href="{{ route('logout') }}"

                  onclick="event.preventDefault();

                 document.getElementById('logout-form').submit();" class="nav-link">

                            Logout  
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
    </ul>
    </div>

    @endif

</nav>