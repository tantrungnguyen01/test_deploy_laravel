@extends('admin.master')

@section('title', 'User - Create')

@section('content-website')
  <h1>User Controller - Action List</h1>

  <table border="1px" align="center">
    <tr>
      <td>ID</td>
      <td>Email</td>
      <td>Level</td>
      <td>Status</td>
      <td colspan="2">Action</td>
    </tr>
    @foreach ($users as $user)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $user->email }} </td>
      <td>{{ $user->level == 1 ? 'Admin' : 'Member' }}</td>
      <td>{{ $user->status == 1 ? 'Active' : 'Block' }}</td>
      <td><a href="{{ route('admin.user.edit', ['id' => $user->id]) }}">Edit</a></td>
      <td><a onClick="return confirmDelete ()" href="{{ route('admin.user.destroy', ['id' => $user->id]) }}">Delete</a></td>
    </tr>
    @endforeach
  </table>
@endsection
