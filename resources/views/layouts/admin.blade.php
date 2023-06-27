<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" href="/img/favicon.png" type="png">
  <title>Laravel Boolfolio @yield('title')</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CKEditor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

  <!-- Usando Vite -->
  @vite(['resources/scss/admin.scss', 'resources/js/admin.js'])
</head>

<body>
  <div id="app">

    @include('admin.partials.header')

    <main>
      <div class="main-wrapper @auth d-flex @endauth">
        @auth
          @include('admin.partials.aside')
        @endauth

        <div class="main-view w-100 overflow-auto">
          @yield('content')
        </div>
      </div>
    </main>

  </div>
</body>

</html>
