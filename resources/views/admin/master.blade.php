<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>@yield('title', 'Admin')</title>
  <link rel="stylesheet" href="{{ asset('admin/css/mystyle.css') }}">
</head>
<body>
  <div class="wrapper">
    <div class="header">New Header</div>
    <div class="content">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (Session::has('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ Session::get('success') }}</strong>
        </div>
        @endif

      @yield('content-website')
    </div>
    <div class="footer">Footer</div>
  </div>


  <script>
    function confirmDelete () {
        if (window.confirm("Do you want to delete this row ?")) {
            return true;
        }

        return false
    }
  </script>
</body>
</html>
