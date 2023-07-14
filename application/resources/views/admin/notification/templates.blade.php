@extends('admin.layouts.app')
@section('panel')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body px-0">
                        <div class="table-responsive--sm table-responsive">
                            <table class="table table--light style--two custom-data-table">
                                <thead>
                                    <tr>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Subject')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($templates as $template)
                                    <tr>
                                        <td>{{ __($template->name) }}</td>
                                        <td>{{ __($template->subj) }}</td>
                                        <td>
                                            <a title="@lang('Edit')"
                                                href="{{ route('admin.setting.notification.template.edit', $template->id) }}"
                                                class="btn btn-sm btn-primary ms-1 editGatewayBtn">
                                                <i class="las la-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                                    </tr>
                                    @endforelse
        
                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>
                </div><!-- card end -->
            </div>
        </div>
    </div>
</div>
@endsection