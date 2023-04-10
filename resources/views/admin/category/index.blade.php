@extends('admin.master')

@section('title', 'Category - Manage')

@section('content-website')
  <h1>Category Controller - Action List</h1>

  <table border="1px" align="center">
    <tr>
      <td>ID</td>
      <td>Name</td>
      <td>Status</td>
      <td colspan="2">Action</td>
    </tr>
    @foreach ($categories as $category)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $category->name }} </td>
      <td>{{ $category->status == 1 ? 'Active' : 'Block' }}</td>
      <td><a href="{{ route('admin.category.edit', ['id' => $category->id]) }}">Edit</a></td>
      <td><a onClick="return confirmDelete ()" href="{{ route('admin.category.destroy', ['id' => $category->id]) }}">Delete</a></td>
    </tr>
    @endforeach
  </table>
@endsection
