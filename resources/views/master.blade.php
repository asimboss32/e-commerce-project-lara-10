<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>E-commerce Landing Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes.css')

</head>

<body>

    <!-- Navbar -->
  @include('includes.header')

  <main>

    @yield('content')
    
  </main>

    <!-- Footer -->
  @include('includes.footer')

   @include('includes.script')
   
   @stack('script')

</body>

</html>