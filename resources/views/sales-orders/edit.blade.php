@extends('layout')

@section('content')
<div class="row justify-content-center g-3">
  <div class="col-md-10">
    <div class="d-flex justify-content-between align-items-center">
      <h3>Edit Sales Order</h3>
      <a href="{{ route('sales-orders.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
  </div>
  <div>
    <edit-sales-order-form :prop_items="{{ Js::from($items) }}" :sales_order="{{ Js::from($sales_order) }}"></edit-sales-order-form>
  </div>
</div>
@endsection('content')