@extends('admin.master')

@section('title', 'User - Create')

@section('content-website')
  <h1>User Controller - Action Create</h1>

  <form action="{{ route('admin.user.store') }}" method="POST">
    @csrf
    <table>
      <tr>
        <td>Email</td>
        <td><input type="text" name="email" value="{{ old('email') }}"></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="password"></td>
      </tr>
      <tr>
        <td>Password Confirmation</td>
        <td><input type="password" name="password_confirmation"></td>
      </tr>
      <tr>
        <td>Fullname</td>
        <td><input type="text" name="fullname" value="{{ old('fullname') }}"></td>
      </tr>
      <tr>
        <td>Phone</td>
        <td><input type="text" name="phone" value="{{ old('phone') }}"></td>
      </tr>
      <tr>
        <td>Address</td>
        <td><input type="text" name="address" value="{{ old('address') }}"></td>
      </tr>
      <tr>
        <td>Level</td>
        <td>
          <select name="level">
            <option value="1" {{ old('level') == 1 ? 'selected' : '' }}>Admin</option>
            <option value="2" {{ old('level') == 2 ? 'selected' : '' }}>Member</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Gender</td>
        <td>
          <input type="radio" name="gender" value="1" {{ old('gender', 1) == 1 ? 'checked' : '' }}> Male
          <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> Female
        </td>
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