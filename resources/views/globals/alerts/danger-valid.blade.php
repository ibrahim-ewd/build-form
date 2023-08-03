@if ($errors->any())
    <div class="mt-3">
        <div class="alert alert-custom alert-outline-2x alert-light-danger display-flex align-items justify-content-between  opacity-75 fade show mb-2  py-1">
            <div class="alert-icon">
                <i class="flaticon2-warning"></i>
            </div>
            <div class="row w-100 pl-5">
                @foreach ($errors->all() as $error)
                    <div class="alert-text col-12">
                       - &nbsp; {{ $error  }}
                    </div>
                @endforeach
            </div>

            <div class="alert-close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                </button>
            </div>
        </div>
    </div>
@endif
