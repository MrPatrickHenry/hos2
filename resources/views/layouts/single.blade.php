<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<body>
<!--Navbar-->
@include('includes.navigation')

<div class="container" ng-app="" ng-controller="customersController">

<!--    <header class="row">
        @include('includes.header')
    </header>
-->
        <!-- main content -->
            @yield('content')
   

        @include('includes.footer')

</div>
</body>
</html>