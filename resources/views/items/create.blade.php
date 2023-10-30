@extends('layout')

@section('content')
<div class="row justify-content-center g-3">
  <div class="col-md-10">
    <div class="d-flex justify-content-between align-items-center">
      <h3>Add New Item</h3>
      <a href="{{ route('items.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
  </div>
  <div>
    <add-item-form></add-item-form>
  </div>
</div>
@endsection('content')