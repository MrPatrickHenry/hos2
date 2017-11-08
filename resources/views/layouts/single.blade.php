<!doctype html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="//js.maxmind.com/js/apis/geoip2/v2.1/geoip2.js" type="text/javascript"></script>

<script>
var redirect = (function () {
    /* This implements the actual redirection. */
    var redirectBrowser = function (site) {
        var uri = "http://state-mode.com/" + cityName + "";
        window.location = uri;
    };

 var cityName = geoipResponse.city.names.en || 'your city';
 
    return function () {
        geoip2.city( onSuccess, onError );
    };
}());
 
redirect();
</script>

  @include('includes.head')
</head>
<?php

$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);


$keyword = "fall"; // Define the text
$city= $uri_segments[1];


?>
<body>

  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-M2B85X"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-M2B85X');</script>
  <!-- End Google Tag Manager -->



  @include('includes.navigation')
  @include('includes.state')
  @include('includes.statenews')
  @include('includes.statetrend')


  <div class="container" ng-app="" ng-controller="customersController">

   @yield('content')
   
   @include('includes.footer')

 </div>
</body>
</html>