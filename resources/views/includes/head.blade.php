
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@if(isset($title))
    <title>{{ $title }}</title>
@else
    <title>Home</title>
@endif
<link rel="stylesheet" href="{{asset('assets/fontawesome/css/all.min.css')}}"> <!-- https://fontawesome.com/ -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" /> <!-- https://fonts.google.com/ -->
<link rel="stylesheet" href="{{asset('assets/css/tooplate-wave-cafe.css')}}">
<style>
    .tm-video-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}
#tm-video {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: translate(-50%, -50%);
}
</style>
<!--
Tooplate 2121 Wave Cafe
https://www.tooplate.com/view/2121-wave-cafe
-->
