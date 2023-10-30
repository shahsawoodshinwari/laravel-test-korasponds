@extends('layout')

@section('content')
<div class="row g-3 justify-content-center">
  <div class="col-md-4">
    <div class="card shadow-sm h-100">
      <h5 class="card-header">Item Master Form</h5>
      <div class="card-body">
        <p class="card-text">
          The purpose of this form is likely to serve as a master list where you can add, view, or update items that will be available for sale.
        </p>
        <div class="text-end pt-3">
          <a href="{{ route('items.index') }}" class="btn btn-primary">Visit</a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card shadow-sm h-100">
      <h5 class="card-header">Sales Entry Form</h5>
      <div class="card-body">
        <p class="card-text">
          This is a dynamic form that allows you to create multiple rows for entry. Each row represents a sale transaction for an item.
        </p>
        <div class="text-end pt-3">
          <a href="{{ route('sales-orders.index') }}" class="btn btn-primary">Visit</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection