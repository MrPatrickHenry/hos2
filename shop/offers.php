<?php
preg_match("//page/(d+)/.*+/", $_SERVER['REQUEST_URI'], $match);
	
$name= $_GET["name"];
$keyword = $_GET["keyword"]; // Define the text
$mid= $_GET["mid"];
?>


<?php require_once('../Connections/local.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_local, $local);
$query_Recordset1 = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers`";
$Recordset1 = mysql_query($query_Recordset1, $local) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_local, $local);
$query_tops = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$tops = mysql_query($query_tops, $local) or die(mysql_error());
$row_tops = mysql_fetch_assoc($tops);
$totalRows_tops = mysql_num_rows($tops);

mysql_select_db($database_local, $local);
$query_skirts = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$skirts = mysql_query($query_skirts, $local) or die(mysql_error());
$row_skirts = mysql_fetch_assoc($skirts);
$totalRows_skirts = mysql_num_rows($skirts);

mysql_select_db($database_local, $local);
$query_Jackets = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$Jackets = mysql_query($query_Jackets, $local) or die(mysql_error());
$row_Jackets = mysql_fetch_assoc($Jackets);
$totalRows_Jackets = mysql_num_rows($Jackets);

mysql_select_db($database_local, $local);
$query_shoes = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$shoes = mysql_query($query_shoes, $local) or die(mysql_error());
$row_shoes = mysql_fetch_assoc($shoes);
$totalRows_shoes = mysql_num_rows($shoes);

mysql_select_db($database_local, $local);
$query_Trousers = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$Trousers = mysql_query($query_Trousers, $local) or die(mysql_error());
$row_Trousers = mysql_fetch_assoc($Trousers);
$totalRows_Trousers = mysql_num_rows($Trousers);

mysql_select_db($database_local, $local);
$query_Sale = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$Sale = mysql_query($query_Sale, $local) or die(mysql_error());
$row_Sale = mysql_fetch_assoc($Sale);
$totalRows_Sale = mysql_num_rows($Sale);

mysql_select_db($database_local, $local);
$query_Brands = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$Brands = mysql_query($query_Brands, $local) or die(mysql_error());
$row_Brands = mysql_fetch_assoc($Brands);
$totalRows_Brands = mysql_num_rows($Brands);

mysql_select_db($database_local, $local);
$query_keywords = "SELECT advertiser_name FROM advertisers WHERE status = 'active' limit 0,11";
$keywords = mysql_query($query_keywords, $local) or die(mysql_error());
$row_keywords = mysql_fetch_assoc($keywords);
$totalRows_keywords = mysql_num_rows($keywords);

mysql_select_db($database_local, $local);
$query_brandssidebar = "SELECT `advertiser_name`, `advertiser_url`, `mid` FROM `advertisers";
$brandssidebar = mysql_query($query_brandssidebar, $local) or die(mysql_error());
$row_brandssidebar = mysql_fetch_assoc($brandssidebar);
$totalRows_brandssidebar = mysql_num_rows($brandssidebar);
?>

<html>
<head>
<meta name="p:domain_verify" content="2901992a9649d5718537db13cedef8dc"/>
<meta charset="UTF-8">
<meta name='description' content='House of Sale lets you browse the highstreet stores sales, at the ease of your pc laptop mobile device, high street, skirts, shoes, jackets, trousers, offers '>
<meta name="keywords" content="<?php do { ?>
  <?php echo $row_keywords['advertiser_name']; ?>
  <?php } while ($row_keywords = mysql_fetch_assoc($keywords)); ?>">
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
<link rel="stylesheet" href="css/style.css" media="screen"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/blocksit.js"></script>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Ledger' rel='stylesheet' type='text/css'>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">

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
padding: 10px 62px;i	text-decoration:none;
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
		$('#container').BlocksIt({
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
			$('#container').width(conWidth);
			$('#container').BlocksIt({
				numOfCol: col,
				offsetX: 8,
				offsetY: 8
			});
		}
	});
});
</script>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21590892-20', 'auto');
  ga('send', 'pageview');

</script>

<title>House of sale, Discount voucher coupon codes</title></head>
<body>
<div id="header"> 
  <h1>
    <a href="../index.php">
    <script>
var addthis_config = {     
    services_overlay:'pinterest'
}</script>
    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=144a93d2-116a-43d6-b8e4-f7604d2affd5"></script>  
    
    
    <span style="color:#CCC">House of </span>Sale <br>
    Voucher Codes and Offers
    <br>
  </a></h1>
<p></p></div>
<div class="menu" id="header" style="height: 26px; position: relative; color: #FFF; background-color: #000; font-size: 9px;"><span class="menu" style="height: 55px; position: fixed; margin-top: 100px; color: #FFF; background-color: #ccc; font-size: 9px;">

</span><span class="menu" style="height: 55px; position: fixed; margin-top: 100px; color: #FFF; background-color: #000; font-size: 9px;"> </span>
<div id="navmenu" style="  margin: 0 auto; width: 50%;">
  <ul id="MenuBar3" class="MenuBarHorizontal">
    <li><a class="MenuBarItemSubmenu" href="#">Brands</a>
      <ul>
        <?php do { ?>
        <li><a href="shop.php?keyword=sale&mid=<?php echo $row_Brands['mid']; ?>&name=<?php echo $row_Recordset1['advertiser_name']; ?>"> <?php echo $row_Brands['advertiser_name']; ?></a></li>
        <?php } while ($row_Brands = mysql_fetch_assoc($Brands)); ?>
      </ul>
    </li>
    <li><a href="../items.php?&keyword=dress" title="Dresses" class="MenuBarItemSubmenu">Dresses</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=Dress&mid=<?php echo $row_Recordset1['mid']; ?>&name=<?php echo $row_Recordset1['advertiser_name']; ?>"> <?php echo $row_Recordset1['advertiser_name']; ?></a></li>
        <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
      </ul>
    </li>
    <li><a href="../items.php?&keyword=tops" title="Tops" class="MenuBarItemSubmenu">Tops</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=Tops&mid=<?php echo $row_tops['mid']; ?>&name=<?php echo $row_tops['advertiser_name']; ?>"> <?php echo $row_tops['advertiser_name']; ?></a></li>
        <?php } while ($row_tops = mysql_fetch_assoc($tops)); ?>
      </ul>
    </li>
    <li><a class="MenuBarItemSubmenu" href="../items.php?&keyword=shoes" title="Shoes">Shoes</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=Shoes&mid=<?php echo $row_shoes['mid']; ?>&name=<?php echo $row_shoes['advertiser_name']; ?>"> <?php echo $row_shoes['advertiser_name']; ?></a></li>
        <?php } while ($row_shoes = mysql_fetch_assoc($shoes)); ?>
      </ul>
    </li>
    <li><a href="../items.php?&keyword=skirts" title="skirts" class="MenuBarItemSubmenu">Skirts</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=Skirts&mid=<?php echo $row_skirts['mid']; ?>&name=<?php echo $row_skirts1['advertiser_name']; ?>"> <?php echo $row_skirts['advertiser_name']; ?></a></li>
        <?php } while ($row_skirts = mysql_fetch_assoc($skirts)); ?>
      </ul>
    </li>
    <li><a href="../items.php?&keyword=Jackets" title="Jackets" class="MenuBarItemSubmenu">Jackets</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=Jackets&mid=<?php echo $row_Jackets['mid']; ?>&name=<?php echo $row_Jackets['advertiser_name']; ?>"> <?php echo $row_Jackets['advertiser_name']; ?></a></li>
        <?php } while ($row_Jackets = mysql_fetch_assoc($Jackets)); ?>
      </ul>
    </li>
    <li><a href="../items.php?&keyword=trousers" title="Trousers" class="MenuBarItemSubmenu">Trousers</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=Trousers&mid=<?php echo $row_Trousers['mid']; ?>&name=<?php echo $row_Trousers['advertiser_name']; ?>"> <?php echo $row_Trousers['advertiser_name']; ?></a></li>
        <?php } while ($row_Trousers = mysql_fetch_assoc($Trousers)); ?>
      </ul>
    </li>
    <li ><a class="MenuBar2" href="../items.php?&keyword=sale">Sale</a>
      <ul>
        <?php do { ?>
        <li><a href="/shop/shop.php?keyword=sale&mid=<?php echo $row_Sale['mid']; ?>&name=<?php echo $row_Sale['advertiser_name']; ?>"> <?php echo $row_Sale['advertiser_name']; ?></a></li>
        <?php } while ($row_Sale = mysql_fetch_assoc($Sale)); ?>
      </ul>
    </li>
  </ul>
  <P>  
</div>
</div>



<div id="container">
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
					                <h3>{$item -> promotiontypes->promotiontype}</h3><br>
                {$item -> offerdescription}<br>
				Ends:  {$item -> offerenddate }<br>

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
         
         <div class="up"  style="position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #000; color: #98C93C; text-align: center;">
            <a class="scrollup" href="#"><br>
Scroll Up</a>
<h6>Copyright House of Sale 2013</h6></div>
         
         
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

<script type="text/javascript">
    $(document).ready(function(){ 
 
        $(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        }); 
 
        $('.scrollup').click(function(){
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
        });
 
    });
</script>


<script type="text/javascript">stLight.options({publisher: "144a93d2-116a-43d6-b8e4-f7604d2affd5", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "144a93d2-116a-43d6-b8e4-f7604d2affd5", "position": "right", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "googleplus", "pinterest", "blogger"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
var MenuBar3 = new Spry.Widget.MenuBar("MenuBar3", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>     


<?php
mysql_free_result($Recordset1);

mysql_free_result($tops);

mysql_free_result($skirts);

mysql_free_result($Jackets);

mysql_free_result($shoes);

mysql_free_result($Trousers);

mysql_free_result($Sale);

mysql_free_result($Brands);
?>
</body>
</html>
