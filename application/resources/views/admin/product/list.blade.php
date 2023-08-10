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
                    <button type="button" class="btn btn-primary btn-sm add" data-bs-toggle="modal" data-bs-target="#addModal"><i class="fas fa-plus"></i>
                        @lang('Add New')
                      </button>
                 
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover" style="width: 100%;">
                        <thead>
                            <tr>
                                <th title="SL">@lang('#SL.')</th>
                                <th title="name">@lang('Product name')</th>
                                <th title="Category">@lang('Category')</th>
                                <th title="Price">@lang('Price')</th>
                                <th title="Stock">@lang('Stock quantity')</th>
                                <th title="Description">@lang('Description')</th>
                              
                                <th title="Action">@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $k=>$item)
                                <tr>
                                    {{-- <td>{{++$k}}</td>
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
                                        @if ($item->status == 1)
                                        <button type="button" class="btn btn-danger btn-sm action" data-bs-toggle="modal" data-route="{{route('admin.category.action',$item->id)}}" data-bs-target="#actionModal">
                                            @lang('Inactive')
                                          </button>
                                           
                                        @elseif($item->status == 0)
                                        <button type="button" class="btn btn-success btn-sm action" data-bs-toggle="modal" data-route="{{route('admin.category.action',$item->id)}}" data-bs-target="#actionModal">
                                            @lang('Active')
                                          </button>
                                        
                                        @endif
                                      
                                        <button class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#addModal" data-id="{{$item->id}}" data-name="{{__($item->name)}}" data-description="{{__($item->description)}}">@lang('Edit')</button>
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center no_data">
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
          <h5 class="modal-title" id="addModalLabel">@lang('Add new product')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
       
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="category">@lang('Product name')</label>
                            <input type="text" name="pr_name" class="form-control" placeholder="@lang('Product name')">
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                           
                            <label for="category">@lang('Category')</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $item)
                                    <option value="{{$item->id}}">{{__($item->name)}}</option>
                                @endforeach
        
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="price">@lang('Price')</label>
                            <input type="number" name="price" class="form-control" placeholder="@lang('Enter your price')">
                        </div>
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                           
                            <label for="quantity">@lang('Quantity')</label>
                            <input type="number" class="form-control" name="stock_quantity" placeholder="@lang('Enter your quantity')">
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="img">@lang('Product Image')</label>
                        <input type="file" name="pr_image" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">@lang('Description')</label>
                    <input row="10" class="form-control" name="description" id="description" placeholder="@lang('Write product description')">
                </div>
                <button type="submit" class="btn btn-primary">@lang('Add')</button>
            </div>
           
        </form>
        

      </div>
    </div>
</div>

{{-- action modal --}}
<div class="modal fade" id="actionModal" tabindex="-1" aria-labelledby="actionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="actionModalLabel">@lang('Change action')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST" class="status">
            @csrf
            <div class="modal-body">
                @lang('Are you want to change status?')
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('No')</button>
                  <button type="submit" class="btn btn-primary">@lang('Yes')</button>
              </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('script')
    <script>
       $('.action').on('click',function(){
            let url = $(this).attr('data-route');
            let modal = $('#actionModal');
            $('.status').attr('action',url);
            modal.show();

       });

    //    edit
       $('.edit').on('click',function(){
            let modal = $('#addModal');
            let name = $(this).data('name');
            let description = $(this).data('description');

            modal.find('[name="id"]').val($(this).data('id'));
            modal.find('[name="category_name"]').val(name);
            modal.find('[name="description"]').val(description);
            modal.show();
       });
    </script>
@endpush