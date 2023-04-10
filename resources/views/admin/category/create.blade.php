@extends('admin.master')

@section('title', 'Category - Create')

@section('content-website')
  <h1>Category Controller - Action Create</h1>
  <form action="{{ route('admin.category.store') }}" method="POST">
    @csrf
    <table>
      <tr>
        <td>Name</td>
        <td><input type="text" name="name" value="{{ old('name') }}"></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          <input type="radio" name="status" value="1" {{ old('status', 1) == 1 ? 'checked' : '' }}> Active
          <input type="radio" name="status" value="2" {{ old('status') == 2 ? 'checked' : '' }}> Block
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Submit"></td>
      </tr>
    </table>
  </form>
@endsection
