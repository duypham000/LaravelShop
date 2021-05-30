<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title')
    </title>
    @include(('partials.includeStyle'))
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('partials.navBar')

    @include('partials.sideMenu')

    @yield('content')

    @include('partials.sideBarControl')

    @include('partials.footer')
</div>
@include('partials.includeScript')
</body>
</html>
