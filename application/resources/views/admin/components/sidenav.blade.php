<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.dashboard')}}">
          <i class="mdi mdi-grid-large menu-icon"></i>
          <span class="menu-title">@lang('Dashboard')</span>
        </a>
      </li>
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
      <li class="nav-item nav-category">@lang('Trx Management')</li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#trx" aria-expanded="false" aria-controls="trx">
          <i class="menu-icon mdi mdi-card-text-outline"></i>
          <span class="menu-title">@lang('Transections')</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="trx">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('admin.deposit.pending')}}">@lang('Deposit')</a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('admin.withdraw.pending')}}">@lang('Withdraw')</a></li>
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




      <li class="nav-item nav-category">@lang('General settings')</li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.setting.index')}}">
          <i class="menu-icon mdi mdi-settings"></i>
          <span class="menu-title">@lang('Global Configuration')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.language.manage')}}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">@lang('Language')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.setting.logo.icon')}}">
          <i class="menu-icon mdi mdi-arrow-all"></i>
          <span class="menu-title">@lang('Logo Configure')</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.frontend.manage.pages')}}">
          <i class="menu-icon mdi mdi-file-document"></i>
          <span class="menu-title">@lang('Page')</span>
        </a>
      </li>
    </ul>
  </nav>