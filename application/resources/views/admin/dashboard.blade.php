@extends('admin.layouts.app')

@section('panel')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            <div class="d-sm-flex align-items-center justify-content-between border-bottom">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                </li>
              </ul>
              <div>
                <div class="btn-wrapper">
                  <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                  <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                  <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                </div>
              </div>
            </div>
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                <div class="row">
                  <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                      <div>
                        <a title="@lang('View all users')" class="dashboard-widget-link"
                                        href="{{route('admin.users.all')}}">
                        <p class="statistics-title">@lang('Total Users')</p>
                        <h3 class="rate-percentage">{{$widget['total_users']}}</h3>
                    </a>
                      </div>
                      <div>
                        <a title="@lang('View active users')" class="dashboard-widget-link"
                                        href="{{route('admin.users.active')}}">
                        <p class="statistics-title">@lang('Active Users')</p>
                        <h3 class="rate-percentage">{{$widget['verified_users']}}</h3>
                        </a>
                        
                      </div>
                      <div>
                        <a title="@lang('View banned users')" class="dashboard-widget-link"
                                        href="{{route('admin.users.email.unverified')}}">
                        <p class="statistics-title">@lang('Email Unverified')</p>
                        <h3 class="rate-percentage">{{$widget['email_unverified_users']}}</h3>
                        </a>
                      </div>
                      <div class="d-none d-md-block">
                        <a title="@lang('View pending withdrawal')" class="dashboard-widget-link"
                                        href="{{route('admin.withdraw.pending')}}">
                        <p class="statistics-title">@lang('Pending Withdrawals')</p>
                        <h3 class="rate-percentage">{{$withdrawals['total_withdraw_pending']}}</h3>
                        </a>
                      </div>
                      <div class="d-none d-md-block">
                        <a title="@lang('View pending deposit')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.pending')}}">
                        <p class="statistics-title">@lang('Pending Deposits')</p>
                        <h3 class="rate-percentage">{{$deposit['total_deposit_pending']}}</h3>
                    </a>
                      </div>
                      <div class="d-none d-md-block">
                        <a title="@lang('View rejected deposit')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.rejected')}}">
                                   
                        <p class="statistics-title">@lang('Rejected Deposits')</p>
                        <h3 class="rate-percentage">{{$deposit['total_deposit_rejected']}}</h3>
                    </a>
                      </div>
                    </div>
                  </div>
                </div> 
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">@lang('Daily Logins (Last 10 days)')</h4>
                                   <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                  </div>
    
                                  <div>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Settings</h6>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$36,2531.00</h2><h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4></div>
                                  <div class="me-3"><div id="marketing-overview-legend"></div></div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex flex-column">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">Market Overview</h4>
                                   <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
                                  </div>
    
                                  <div>
                                    <div class="dropdown">
                                      <button class="btn btn-secondary dropdown-toggle toggle-dark btn-lg mb-0 me-0" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> This month </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <h6 class="dropdown-header">Settings</h6>
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#">Separated link</a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="d-sm-flex align-items-center mt-1 justify-content-between">
                                  <div class="d-sm-flex align-items-center mt-4 justify-content-between"><h2 class="me-2 fw-bold">$36,2531.00</h2><h4 class="me-2">USD</h4><h4 class="text-success">(+1.37%)</h4></div>
                                  <div class="me-3"><div id="marketing-overview-legend"></div></div>
                                </div>
                                <div class="chartjs-bar-wrapper mt-3">
                                  <canvas id="marketingOverview"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Recent support tickets --}}

                <div class="row mt-4">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card card-rounded">
                            <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                <h4 class="card-title card-title-dash">@lang('Recent tickets')</h4>
                             
                                </div>
                                <div>
                                    <a href="{{route('admin.ticket.pending')}}" class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-card-details"></i>@lang('See all')</a>
                                </div>
                            </div>
                            <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                <thead>
                                    <tr>
                                    
                                    <th>@lang('Subject')</th>
                                    <th>@lang('Status')</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $newTickets as $item)
                                    <tr>
                                        <td>
                                            <a class="" href="{{ route('admin.ticket.view', $item->id) }}" class="fw-bold">
                                                @lang('Ticket')#{{ $item->ticket }} - {{ strLimit($item->subject,30) }} </a>
                                        </td>
                                        <td>
                                            @if ($item->status ==0)
                                            <div class="badge badge-opacity-warning"> @lang('Open')</div>
                                            @elseif($item->status ==1)
                                            <div class="badge badge-opacity-success"> @lang('Answered')</div>
                                            @elseif($item->status == 2)
                                            <div class="badge badge-opacity-primary"> @lang('Reply')</div>
                                            @elseif($item->status == 3)
                                            <div class="badge badge-opacity-danger"> @lang('Closed')</div>
                                            
                                                
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                  
                            
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash.</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection