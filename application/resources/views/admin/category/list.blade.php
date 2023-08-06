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
                    <button type="button" class="btn btn-primary btn-sm add" data-bs-toggle="modal" data-bs-target="#addModal">
                        @lang('Add New')
                      </button>
                 
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th title="SL">@lang('#SL.')</th>
                                <th title="Category">@lang('Category')</th>
                                <th title="Description">@lang('Description')</th>
                                <th title="Status">@lang('Status')</th>
                                <th title="Action">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $k=>$item)
                                <tr>
                                    <td>{{++$k}}</td>
                                    <td>{{__($item->name)}}</td>
                                    <td>{{Str::limit($item->description,50)}}</td>
                                    <td> 
                                        @if ($item->status == 1)
                                        <span class="badge badge-success text-light">@lang('Active')</span>
                                        @else
                                            <span class="badge badge-danger text-light">@lang('Inactive')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">@lang('Edit')</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center no_data" colspan="5">
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

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">@lang('Add new category')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
        <form action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label for="category">@lang('Category')</label>
                    <input type="text" class="form-control" name="category_name" id="category" placeholder="Enter category name" required>
                </div>
                <div class="form-group">
                    <label for="description">@lang('Description')</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter description">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">@lang('Add')</button>
            </div>
        </form>
        

      </div>
    </div>
  </div>
@endsection

{{-- @push('script')
    <script>
       $('.add').on('click',function(){

       });
    </script>
@endpush --}}