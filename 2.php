<?php
preg_match("//page/(d+)/.*+/", $_SERVER['REQUEST_URI'], $match);
	
$name= $_GET["name"];
$keyword = $_GET["keyword"]; // Define the text
$mid= $_GET["mid"];
?>

<html>
<head>
<meta name="p:domain_verify" content="2901992a9649d5718537db13cedef8dc"/>
<meta charset="UTF-8">
<meta name='description' content='House of Sale lets you browse the highstreet stores sales, at the ease of your pc laptop mobile device, high street, skirts, shoes, jackets, trousers, offers '>

	<meta name='robots' content='index, follow'>
<meta name='author' content='House of Sale'>
<meta name='geo.placename' content='London'>
<meta name='geo.region' content='UK-GB'>
<meta property='og:type' content='Business' >
<meta property='og:url' content='http://houseofsale.co.uk/'>
<meta property='og:image' content='http://houseofsale.co.uk/images/hos.jpg"'>
<meta property='og:site_name' content='House of Sale'>
<meta property='og:description' content='House of Sale lets you browse the highstreet stores sales, at the ease and luxury of one location, fashion, high street, skirts, shoes, jackets, trousers, offers ' />
<meta property='fb:admins' content='patrick.henry.mcsd'>
<meta property='og:locality' content='London'>
<meta property='og:region' content='UK-GB'>
<meta name="apple-itunes-app" content="app-id=583881786">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="p:domain_verify" content="2901992a9649d5718537db13cedef8dc"/>
<link rel="stylesheet" href="shop/css/style.css" media="screen"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/blocksit.js"></script>
<link href='http://fonts.googleapis.com/css?family=Ledger' rel='stylesheet' type='text/css'>
<style>
body{
	margin:0 auto;
	font-family:Arial, Helvetica, sans-serif;
}

       

   .images{
	   width:200px;
	   margin-top:5px;
    box-shadow: rgba(0, 0, 0, 0.199219) 0px 0px 7px 4px;
   }
   
   #header{
	background-color: #FFF;
font-family: 'Ledger', serif;	color: rgb(152, 201, 60);
	height: 75px;
	position: relative;
	padding: 10px;
	text-align: center;
	z-index: 10000;
	width: 100%;
   }
   
   .feed-item{
	   margin-left:200px;
	   width:400px;
	   height:400px;
	  
   }
   
   .link{
	   background-color: rgb(183, 19, 66);
	   width:40px;
	   height:40px;
	   text-align:center;
	   color: rgb(255, 255, 255);
    font-family: Helvetica;
    font-size: 13px;
	padding:10px;
	text-decoration:none;
	margin-top:5px;

   }
   
   
    .link:hover{
	   background-color:#98C936;
	   width:40px;
	   height:40px;
	   text-align:center;
	   color: rgb(255, 255, 255);
    font-family: Helvetica;
    font-size: 13px;
	padding:10px;
	text-decoration:none;
	margin-top:5px;

   }

	   
   .menu{
	   position:fixed;
   }
   
   
   
   .scrollup{
    width:80px;
    height:40px;
    opacity:0.8;
    position:fixed;
    bottom:0px;
    right:50px;
    display:none;
    text-indent:-9999px;
}
   
   .up {
	color: #CCC;
}
.dashes {
	color: #8EC93C;
}
#brandbar {
	padding: 5px;
	float: left;
	height: auto;
	width: 200px;
	left: 25px;
	margin-top: 40px;
	list-style-type: none;
	font-size: 12px;
	color: #CCC;
	position:static;
}
</style>

<script>

$(document).ready(function() {
	//vendor script
	
	
	$('#footer')
	.css({ 'bottom':-15 })
	.delay(1000)
	.animate({'bottom': 0}, 800);
	
	//blocksit define
	$(window).load( function() {
		$('#feedwrapper').BlocksIt({
			numOfCol: 3,
			offsetX: 8,
			offsetY: 8
		});
	});
	
	//window resize
	var currentWidth = 1100;
	$(window).resize(function() {
		var winWidth = $(window).width();
		var conWidth;
		if(winWidth < 660) {
			conWidth = 440;
			col = 2
		} else if(winWidth < 880) {
			conWidth = 660;
			col = 3
		} else if(winWidth < 1100) {
			conWidth = 880;
			col = 3;
		} else {
			conWidth = 1100;
			col = 5;
		}
		
		if(conWidth != currentWidth) {
			currentWidth = conWidth;
			$('#feedwrapper').width(conWidth);
			$('#feedwrapper').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
<script type="text/javascript">var switchTo5x=true;</script>

<title>House of sale, Discount voucher coupon codes</title></head>
<body>
<div id="feedwrapper">
  <?php


  $request_url = apache_getenv("HTTP_HOST") . apache_getenv("REQUEST_URI");





            # INSTANTIATE CURL.
            $curl = curl_init();

            # CURL SETTINGS.
            curl_setopt($curl, CURLOPT_URL, "http://couponfeed.linksynergy.com/coupon?token=4acca9e0828906b9c844db7474c1db8ce6c652a873a8c625550cb57000808f5c&network=3&resultsperpage=100&pagenumber=1");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

            # GRAB THE XML FILE.
            $xml = curl_exec($curl);

            curl_close($curl);

            # SET UP XML OBJECT.
            $xmlObj = simplexml_load_string( $xml );

            $tempCounter = 0;

            foreach ( $xmlObj->link as $item )
            {                    
                # DISPLAY ONLY 10 ITEMS.
                if ( $tempCounter < 120 )
                {
                   echo "
				        <div class=\"grid\">
                   <div class=\"imgholder\">
				    <strong> {$item -> advertisername}</strong><br>
					                {$item -> promotiontypes->promotiontype}<br>
                {$item -> offerdescription}<br>
                   {$item -> offerstartdate }<br>
				  {$item -> offerenddate }<br>

                   <strong>Code: {$item -> couponcode}</strong><br>
                   <a href =\"{$item -> clickurl}\"/> <img class=\"images, addthis_shareable\" src=\"{$item -> impressionpixel}\"   
	addthis:url=\"       
	".$request_url."
	 \" addthis:title=\"     \" 
				   
				   
				   /></a>
				  <br> <a href =\"{$item -> clickurl}&amp;u1=site\"/>Redeem this offer</a>
                   </div>
				   </div>
                   ";

                }
				else if ( $tempCounter <=0 )
                {
                   echo "Sorry no items available";}

                $tempCounter += 1;
            
			 
			
			}
			
			
			
			
            ?>  
  <br>
            
        

</div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21590892-20']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>




</body>
</html>
