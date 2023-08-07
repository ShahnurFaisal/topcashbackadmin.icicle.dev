@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    <li>{{ $error }}</li>
</div>
@endforeach
@endif
