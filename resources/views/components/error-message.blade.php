@props(['errors'])

@if (count($errors) > 0)
<div class="alert alert-icon bg-white text-danger alert-danger alert-dismissible fade show" style="font-size: 12px; font-weight:500; font-family: Montserrat" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <i class="mdi mdi-block-helper mr-2"></i>
    <strong>Attention!</strong> Correct these issues and try submitting again.
    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
