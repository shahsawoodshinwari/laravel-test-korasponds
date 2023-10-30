@extends('layout')

@section('content')
<div class="container">
  <div class="row g-3">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h3>Item List</h3>
        <a href="{{ route('items.create') }}" class="btn btn-primary">Add Item</a>
      </div>
    </div>
    <div class="col-12">
      <div class="table-responsive">
        <table class="table text-center">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Arabic Name</th>
              <th scope="col">Price</th>
              <th scope="col">Stock</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            @forelse ($items as $item)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $item->name }}</td>
              <td>{{ $item->arabic_name }}</td>
              <td>SAR {{ $item->price }}</td>
              <td>{{ $item->stock }}</td>
              <td>
                <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                <form onsubmit="return confirm('Are you sure, you want to delete?')" action="{{ route('items.destroy', $item->id) }}" method="POST" class="d-inline-block">
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