<!doctype html>
<html>
<head>
    @include('includes.head')
</head>
<?php
	
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = explode('/', $uri_path);


//$keyword = $_POST["keyword"];

//$city= $uri_segments[1];
$keyword = $uri_segments[2]; // Define the text
$mid= "122";
$page= $uri_segments[1]; 
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

		@include('includes.statetrend')


<div class="container" ng-app="" ng-controller="customersController">

	@yield('content')
   
	@include('includes.footer')

</div>
</body>
</html>