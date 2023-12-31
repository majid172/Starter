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
                    <input type="hidden" name="id" >
                    <label for="category">@lang('Category')</label>
                    <input type="text" class="form-control" name="category_name" id="category" placeholder="@lang('Enter category name')" required>
                </div>
                <div class="form-group">
                    <label for="description">@lang('Description')</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="@lang('Enter description')">
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