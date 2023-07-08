@extends('admin.layouts.app')

@section('panel')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-sm-12">
          <div class="home-tab">
            
            <div class="tab-content tab-content-basic">
              <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                <div class="row">
                  <div class="col-sm-12">
                    <div class="statistics-details d-flex align-items-center justify-content-between">
                      
                      <div class="card">
                        <div class="card-body">
                          <a title="@lang('View all users')" class="dashboard-widget-link"
                                        href="{{route('admin.users.all')}}">
                          <p class="statistics-title">@lang('Total Users')</p>
                          <h3 class="rate-percentage">{{$widget['total_users']}}</h3>
                          </a>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-body">
                          <a title="@lang('View active users')" class="dashboard-widget-link"
                          href="{{route('admin.users.active')}}">
                          <p class="statistics-title">@lang('Active Users')</p>
                          <h3 class="rate-percentage">{{$widget['verified_users']}}</h3>
                          </a>
                        </div>
                      </div>

                      <div class="card">
                        <div class="card-body">
                          <a title="@lang('View banned users')" class="dashboard-widget-link"
                                        href="{{route('admin.users.email.unverified')}}">
                          <p class="statistics-title">@lang('Email Unverified')</p>
                          <h3 class="rate-percentage">{{$widget['email_unverified_users']}}</h3>
                          </a>
                        </div>
                        
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <a title="@lang('View pending withdrawal')" class="dashboard-widget-link"
                                        href="{{route('admin.withdraw.pending')}}">
                        <p class="statistics-title">@lang('Pending Withdrawals')</p>
                        <h3 class="rate-percentage">{{$withdrawals['total_withdraw_pending']}}</h3>
                        </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <a title="@lang('View pending deposit')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.pending')}}">
                        <p class="statistics-title">@lang('Pending Deposits')</p>
                        <h3 class="rate-percentage">{{$deposit['total_deposit_pending']}}</h3>
                    </a>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-body">
                          <a title="@lang('View rejected deposit')" class="dashboard-widget-link"
                                        href="{{route('admin.deposit.rejected')}}">
                                   
                        <p class="statistics-title">@lang('Rejected Deposits')</p>
                        <h3 class="rate-percentage">{{$deposit['total_deposit_rejected']}}</h3>
                    </a>
                        </div>
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
                                  
                                  </div>
                                 
                                </div>
                               

                                <div id="loginChart"style="height: 300px; width: 100%;"></div>

                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 d-flex flex-column">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                    <h4 class="card-title card-title-dash">@lang('Deposit & Withdraw Report')</h4>
                                  
                                  </div>
                                 
                                </div>
                               

                                <div id="depositChart"style="height: 300px; width: 100%;"></div>

                            </div>
                        </div>
                    </div>
                    
                </div>

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

  </div>
@endsection

@push('script')
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
{{-- login line char --}}
<script>
  
  window.onload = function () {

    var chart = new CanvasJS.Chart("loginChart", {
  animationEnabled: true,
  theme: "light2",
  title: {},
  data: [{
    type: "line",
    indexLabelFontSize: 12,
    dataPoints: [
      @foreach($userLogins['values'] as $key => $value)
        { y: {{ $value }}, indexLabel: "{{ $userLogins['labels'][$key] }}" },
      @endforeach
    ]
  }]
});

var depositChart = new CanvasJS.Chart("depositChart", {
    animationEnabled: true,
    axisY: {
        valueFormatString: "#,.",
        suffix: "",
        title: "Amount"
    },
    axisX: {
        title: "Month"
    },
    data: [{
        type: "column",
        dataPoints: [
            <?php foreach ($depositsChart['labels'] as $index => $label): ?>
                { label: "<?php echo $label; ?>", y: <?php echo $depositsChart['values'][$index]; ?>, indexLabel: "$<?php echo $depositsChart['values'][$index]; ?>" },
            <?php endforeach; ?>
            <?php foreach ($withdrawalsChart['labels'] as $index => $label): ?>
                { label: "<?php echo $label; ?>", y: <?php echo $withdrawalsChart['values'][$index]; ?>, indexLabel: "-$<?php echo $withdrawalsChart['values'][$index]; ?>", color: "red" },
            <?php endforeach; ?>
        ]
    }]
});
var depositChart = new CanvasJS.Chart("depositChart", {
    animationEnabled: true,
    axisY: {
        valueFormatString: "#,.",
        suffix: "",
        title: "Amount"
    },
    axisX: {
        title: "Deposit & Withdraw"
    },
    data: [{
        type: "column",
        dataPoints: [
            <?php foreach ($depositsChart['labels'] as $index => $label): ?>
                { label: "<?php echo $label; ?>", y: <?php echo $depositsChart['values'][$index]; ?>, indexLabel: "$<?php echo $depositsChart['values'][$index]; ?>" },
            <?php endforeach; ?>
            <?php foreach ($withdrawalsChart['labels'] as $index => $label): ?>
                { label: "<?php echo $label; ?>", y: <?php echo $withdrawalsChart['values'][$index]; ?>, indexLabel: "-$<?php echo $withdrawalsChart['values'][$index]; ?>", color: "red" },
            <?php endforeach; ?>
        ]
    }]
});


  depositChart.render();
  chart.render();


}
</script>

@endpush
