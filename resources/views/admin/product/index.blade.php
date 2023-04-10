@extends('admin.master')

@section('title', 'Product - Manage')

@section('content-website')
  <h1>Product Controller - Action List</h1>

  <table border="1px" align="center">
    <tr>
      <td>Image</td>
      <td>Name</td>
      <td>Price</td>
      <td>Status</td>
      <td>Created At</td>
      <td colspan="2">Action</td>
    </tr>
    @foreach ($products as $product)
    <tr>
        @php
            $hinh = $product->image == null || !file_exists(public_path('image/'. $product->image))  ?  'https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-1-scaled.png' : asset('image/'. $product->image)
        @endphp
      <td><img src="{{ $hinh }}" width="100" /></td>
      <td>{{ $product->name }} </td>
      <td>{{ number_format($product->price,0, "", ".") }} VND</td>
      <td>{{ $product->status == 1 ? 'Active' : 'Block' }}</td>
      <td>{{ date("d-m-Y H:i:s", strtotime($product->created_at)) }} </td>
      <td><a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">Edit</a></td>
      <td><a onClick="return confirmDelete ()" href="{{ route('admin.product.destroy', ['id' => $product->id]) }}">Delete</a></td>
    </tr>
    @endforeach
  </table>
@endsection
