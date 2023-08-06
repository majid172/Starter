@extends('admin.layouts.app')
@section('panel')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title text-primary">{{$pageTitle}}</h4>
                
                <div class="d-flex justify-content-end mb-2">
                    <a href="#" class="btn btn-primary btn-sm">@lang('Add New')</a>
                </div>
                <hr>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th title="SL">@lang('#SL.')</th>
                        <th title="Category">@lang('Category')</th>
                        <th title="Description">@lang('Description')</th>
                        <th title="Action">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $k=>$item)
                        <tr>
                            <td>{{++$k}}</td>
                            <td>{{__($item->name)}}</td>
                            <td>{{__($item->description)}}</td>
                            <td>
                                <button class="btn ">@lang('Edit')</button>
                            </td>
                        </tr>
                    
                    @empty
                    <tr>
                        <td class="text-muted text-center no_data" colspan="4">
                            <img src="{{asset('assets/images/empty-box.png')}}" alt="Empty Table">
                            <p>{{ __($emptyMessage) }}</p>
                        </td>
                    </tr>
                    @endforelse
                    
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<x-confirmation-modal></x-confirmation-modal>
@endsection