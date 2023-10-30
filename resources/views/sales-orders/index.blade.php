@extends('layout')

@section('content')
<div class="container">
  <div class="row g-3">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h3>Sales Orders List</h3>
        <a href="{{ route('sales-orders.create') }}" class="btn btn-primary">Create</a>
      </div>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="table text-center align-middle table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order Placed</th>
              <th scope="col">Items Selected</th>
              <th scope="col">Total</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @forelse ($sales_orders as $sales_order)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $sales_order->created_at }}</td>
              <td>
                <ol class="list-group list-group-numbered list-group-flush">
                  @foreach ($sales_order->items as $item)
                  <li class="list-group-item">{{ $item->name . '(' . __($item->arabic_name) . ')' }}</li>
                  @endforeach
                </ol>
              </td>
              <td>SAR {{ $sales_order->total() }}</td>
              <td>
                <a href="{{ route('sales-orders.edit', $sales_order->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                <form onsubmit="return confirm('Are you sure, you want to delete?')" action="{{ route('sales-orders.destroy', $sales_order->id) }}" method="POST" class="d-inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center">No items found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection('content')