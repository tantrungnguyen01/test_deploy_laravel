@extends('admin.master')

@section('title', 'Product - Edit')

@section('content-website')
  <h1>Product Controller - Action Edit</h1>
  <form action="{{ route('admin.product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <table>
     <tr>
        <td>Category</td>
        <td>
            <select name="category_id" id="">
                <option value="">Please choose category</option>

                @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </td>
      </tr>
      <tr>
        <td>Name</td>
        <td><input type="text" name="name" value="{{ old('name', $product->name) }}"></td>
      </tr>
      <tr>
        <td>Price</td>
        <td><input type="text" name="price" value="{{ old('price', $product->price) }}"></td>
      </tr>
      <tr>
        <td>Intro</td>
        <td><textarea name="intro">{{ old('price', $product->intro) }}</textarea></td>
      </tr>
      <tr>
        <td>Content</td>
        <td><textarea name="content">{{ old('content', $product->content) }}</textarea></td>
      </tr>
      <tr>
        <td>Status</td>
        <td>
          <input type="radio" name="status" value="1" {{ old('status', $product->status) == 1 ? 'checked' : '' }}> Active
          <input type="radio" name="status" value="2" {{ old('status', $product->status) == 2 ? 'checked' : '' }}> Block
        </td>
      </tr>
      <tr>
        <td>Image current</td>
        <td>
          <img src="{{ asset('image/'.$product->image) }}" alt="" width="50px">
        </td>
      </tr>
      <tr>
        <td>Image</td>
        <td>
          <input type="file" name="image" />
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Submit"></td>
      </tr>
    </table>
  </form>
@endsection
