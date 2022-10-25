

@if (session('success'))

<div class="alert alert-icon   text-success alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="mdi mdi-check-all mr-2"></i>
    <strong>Success!</strong>   {{ session('success') }}
</div>
@endif
