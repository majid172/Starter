<nav class="sidebar sidebar-offcanvas" id="sidebar" style="overflow-y: scroll;
    max-height: 100vh;">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">@lang('Dashboard')</span>
        </a>
      </li>

      {{-- categories --}}
      <li class="nav-item nav-category">@lang('Category')</li>
      <li class="nav-item"> <a class="nav-link" href="{{route('admin.category')}}"> <i class="menu-icon mdi mdi-folder-outline"></i>
        <span class="menu-title">  @lang('List')</span>
      </a></li>

      <li class="nav-item nav-category">@lang('Product')</li>
      <li class="nav-item"> <a class="nav-link" href="{{route('admin.product.list')}}"> <i class="menu-icon mdi mdi-fish"></i>
        <span class="menu-title">  @lang('Product list')</span>
      </a></li>

      <li class="nav-item nav-category">@lang('Users Management')</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="menu-icon mdi mdi-account-circle-outline"></i>
          <span class="menu-title">@lang('All Users')</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.active')}}">@lang('Active Users')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.banned')}}">@lang('Banned Users')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.users.all')}}">@lang('All Lists')</a></li>
          </ul>
        </div>
      </li>

      {{-- deposit management --}}
      <li class="nav-item nav-category">@lang('Deposit Management')</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#deposit" aria-expanded="false" aria-controls="deposit">
          <i class="menu-icon mdi mdi-cash"></i>
          <span class="menu-title">@lang('Deposit Details')</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="deposit">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.deposit.list')}}">@lang('Deposit List')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.deposit.initiated')}}">@lang('Initiated')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.deposit.pending')}}">@lang('Pending')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.deposit.approved')}}">@lang('Approved')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.deposit.successful')}}">@lang('Successful')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.deposit.rejected')}}">@lang('Rejected')</a></li>
          </ul>
        </div>
      </li>


      {{-- withdraw --}}
      <li class="nav-item nav-category">@lang('Withdraw Management')</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#withdraw" aria-expanded="false" aria-controls="withdraw">
          <i class="menu-icon mdi mdi-bank-transfer-out"></i>
          <span class="menu-title">@lang('Withdraw Details')</span>
          <i class="menu-arrow"></i> 
        </a>
        <div class="collapse" id="withdraw">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.withdraw.log')}}">@lang('withdraw List')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.withdraw.pending')}}">@lang('Pending')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.withdraw.approved')}}">@lang('Approved')</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('admin.withdraw.rejected')}}">@lang('Rejected')</a></li>
          </ul>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#trx" aria-expanded="false" aria-controls="trx">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">@lang('Transections')</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="trx">
          <ul class="nav flex-column sub-menu">
           
         
            <li class="nav-item"><a class="nav-link" href="{{route('admin.report.transaction')}}">@lang('Transections')</a></li>
          </ul>
        </div>
      </li>

            {{-- report management --}}
      <li class="nav-item nav-category">@lang('Report Management')</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
          <i class="menu-icon mdi mdi-chart-line"></i>
          <span class="menu-title">@lang('Report')</span>
          <i class="menu-arrow"></i>
        </a>
      
          <div class="collapse" id="reports">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('admin.report.notification.history')}}">@lang('Notifications')</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{route('admin.ticket.pending')}}">@lang('Support Ticket')</a></li>
             
            </ul>
        </div>
      </li>
      

      {{-- payment gateways --}}

      <li class="nav-item nav-category">@lang('Gateways')</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#gateways" aria-expanded="false" aria-controls="gateways">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">@lang('Payment Gateways')</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="gateways">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('admin.gateway.automatic.index')}}">@lang('Automatic')</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('admin.gateway.manual.index')}}">@lang('Manual')</a></li>
           
          </ul>
        </div>
      </li>

{{-- Configuration --}}

      <li class="nav-item nav-category">@lang('Basic Configuration')</li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.setting.index')}}">
          <i class="menu-icon mdi mdi-settings"></i>
          <span class="menu-title">@lang('Configuration Globally')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.language.manage')}}">
          <i class="menu-icon mdi mdi-translate"></i>

          <span class="menu-title">@lang('Language')</span>
        </a>
      </li>

      <li class="nav-item {{menuActive(['admin.report.login.history','admin.report.login.ipHistory'])}}">
        <a href="{{route('admin.report.login.history')}}" class="nav-link">
          <i class="menu-icon mdi mdi-login"></i>

            <span class="menu-title">@lang('Login Activities')</span>
        </a>
      </li>

      <li class="nav-item {{menuActive('admin.report.notification.history')}}">
        <a href="{{route('admin.report.notification.history')}}" class="nav-link">
          <i class="menu-icon mdi mdi-bell-outline"></i>

            <span class="menu-title">@lang('Notifications')</span>
        </a>
    </li>


  {{-- email notification --}}
  <li class="nav-item nav-category">@lang('Email Notification')</li>
  <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#email" aria-expanded="false" aria-controls="email">
      <i class="menu-icon mdi mdi-card-text-outline"></i>
      <span class="menu-title">@lang('Email & Notification')</span>
      <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="email">
      <ul class="nav flex-column sub-menu">
        <li class="nav-item"><a class="nav-link" href="{{route('admin.setting.notification.templates')}}">@lang('Templates')</a></li>

        <li class="nav-item"><a class="nav-link" href="{{route('admin.setting.notification.global')}}">@lang('Common Template')</a></li>
        
        <li class="nav-item"><a class="nav-link" href="{{route('admin.setting.notification.email')}}">@lang('Email config')</a></li>
       
      </ul>
    </div>
  </li>


      @php
        $lastSegment = collect(request()->segments())->last();
      @endphp
      <li class="nav-item nav-category">@lang('Page & Content ')</li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.frontend.manage.pages')}}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">@lang('Page')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#section" aria-expanded="false" aria-controls="section">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">@lang('Contents')</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="section">
          <ul class="nav flex-column sub-menu">
            @foreach(getPageSections(true) as $k => $secs)
            @if($secs['builder'])
            <li class="nav-item @if($lastSegment == $k) active @endif "><a class="nav-link" href="{{ route('admin.frontend.sections',$k) }}">{{__($secs['name'])}}</a></li>
            @endif
            @endforeach
           
          </ul>
        </div>
      </li>

     
    </ul>
  </nav>