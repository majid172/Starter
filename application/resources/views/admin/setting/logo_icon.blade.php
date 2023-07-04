@extends('admin.layouts.app')
@section('panel')
<div class="row mb-none-30">
    <div class="col-md-12 mb-30">
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="row my-3 mx-1 border p-3">
                        <div class="col-md-4 d-flex flex-column justify-content-center">
                            <label>@lang('Logo')</label>
                            <div class="file-upload-wrapper" data-text="@lang('Select your file!')">
                                <input type="file"   accept=".png, .jpg, .jpeg" name="logo" class="file-upload-field form-control" />
                            </div>
                        </div>
                        {{-- <div class="col-md-4 d-flex align-items-center justify-content-center bg--dark">
                            <img src=" {{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}">
                        </div> --}}
                        <div class="col-md-4 d-flex align-items-center justify-content-center bg--gray">
                            <img src=" {{ getImage(getFilePath('logoIcon').'/logo.png', '?'
                                    .time()) }}" alt="{{config('app.name')}}">
                        </div>
                    </div>
                    <div class="row my-3 mx-1 border p-3">
                        <div class="col-4 d-flex flex-column justify-content-center">
                            <label>@lang('Favicon')</label>
                            <div class="file-upload-wrapper" data-text="@lang('Select your file!')">
                                <input type="file" accept=".png, .jpg, .jpeg"  name="favicon"
                                    class="file-upload-field form-control" />
                            </div>
                        </div>
                        <div class="col-8 d-flex align-items-center justify-content-center"">
                                                <img src=" {{ getImage(getFilePath('logoIcon') .'/favicon.png', '?'
                            .time()) }}" alt="{{config('app.name')}}" width="70">
                        </div>
                    </div>
                    <div class="form-group mb-0 ">
                        <button type="submit" class="btn btn-primary btn-global">@lang('Submit')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('style')
    <style>
        /* Styles for the container div */
.col-md-4 {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

/* Styles for the label */
label {
  /* Add your label styles here */
}

/* Styles for the file upload wrapper */
.file-upload-wrapper {
  /* Add your file upload wrapper styles here */
}

/* Styles for the file upload field */
.file-upload-field {
  /* Add your file upload field styles here */
}

/* Styles for the logo image container */
.bg--dark {
  /* Add your styles for the dark background container here */
}

/* Styles for the logo image */
.bg--dark img {
  /* Add your styles for the logo image inside the dark container here */
}

/* Styles for the logo image container with gray background */
.bg--gray {
  /* Add your styles for the gray background container here */
}

/* Styles for the logo image inside the gray container */
.bg--gray img {
  /* Add your styles for the logo image inside the gray container here */
}

    </style>
@endpush