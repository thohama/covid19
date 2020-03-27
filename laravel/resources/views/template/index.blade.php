<!DOCTYPE html>
<html>
@include('template.head')
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('template.header')
    @include('template.sidebar')
    @yield('content')
@include('template.script')
</body>
</html>
