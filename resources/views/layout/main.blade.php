
<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
  <div class="tm-container">
    <div class="tm-row">
@include('includes.siteHeader')
<div class="tm-right">
    <main class="tm-main">

@yield('content')

    </main>
</div>
    </div>
   @include('includes.footer')
  </div>
@include('includes.video')
@include('includes.script')
</body>
</html>


