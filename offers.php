<?php
preg_match("//page/(d+)/.*+/", $_SERVER['REQUEST_URI'], $match);
	
$name= $_GET["name"];
$keyword = $_GET["keyword"]; // Define the text
$mid= $_GET["mid"];
$promotion= $_GET["ptype"];

?>


<?php require_once('Connections/local.php'); ?>
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
$query_brandssidebar = "SELECT * FROM `advertisers` WHERE `advertiser_name` not like '{*}%'";
$brandssidebar = mysql_query($query_brandssidebar, $local) or die(mysql_error());
$row_brandssidebar = mysql_fetch_assoc($brandssidebar);
$totalRows_brandssidebar = mysql_num_rows($brandssidebar);
?>

<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="utf-8">
  <title>House of Sale</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  
  <!-- Styles --> <link href='http://fonts.googleapis.com/css?family=Raleway:400,200,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,300,700,900' rel='stylesheet' type='text/css'>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21590892-20', 'auto');
  ga('send', 'pageview');

</script>
<script src="grid.js">
</script>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>



 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


<script>
var addthis_config = {     
    services_overlay:'pinterest, facebook'}
    </script>
    <script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=144a93d2-116a-43d6-b8e4-f7604d2affd5"></script>  
</head>

<body>

    <nav>
        <ul class="list-unstyled main-menu">
          
          <!--Include your navigation here-->
          <!--Include your navigation here-->
          <li class="text-right"><a href="#" id="nav-close"><i class="fa fa-times" style="color:#98C93C"></i>
</a></li>          <form name="form1" style="margin-left:10px;" method="get" action="./results.php?&keyword=">
    <label for="search"></label>
    <input name="keyword" type="text" id="keyword" value="" placeholder="Search..." size="20">
    
    <button type="submit" class="btn btn-default">
                                    <span class="fa fa-search"></span>
                                </button>
     </form>
          <?php do { ?>
      
      
      <li><a  href="brands.php?keyword=sale&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>"> <?php echo $row_brandssidebar['advertiser_name']; ?></a>
      
      <!-- submenus -->
      
            <ul class="list-unstyled">
    
      <li class="sub-nav">
      <a  href="brands.php?keyword=dresses&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Dresses<span class="icon"></span>
      </a>
      </li>
            
               <li class="sub-nav">
      <a  href="brands.php?keyword=shoes&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Shoes<span class="icon"></span>
      </a>
      </li>
      
          <li class="sub-nav">
      <a  href="brands.php?keyword=tops&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Tops<span class="icon"></span>
      </a>
      </li>
      
        <li class="sub-nav">
      <a  href="brands.php?keyword=boots&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Boots<span class="icon"></span>
      </a>
      </li>
          
           <li class="sub-nav">
      <a  href="brands.php?keyword=shirts&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Shirts<span class="icon"></span>
      </a>
      </li> 
      
         <li class="sub-nav">
      <a  href="brands.php?keyword=skirts&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Skirts<span class="icon"></span>
      </a>
      </li>  
      
      
        <li class="sub-nav">
      <a  href="brands.php?keyword=jackets&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      Jackets<span class="icon"></span>
      </a>
      </li> 
      
       <li class="sub-nav">
      <a  href="brands.php?keyword=sale&mid=<?php echo $row_brandssidebar['mid']; ?>&name=<?php echo $row_brandssidebar['advertiser_name']; ?>">
      All Sale<span class="icon"></span>
      </a>
      </li> 
            
      </ul>
       
      
      
      <!-- end of submenus -->
      
      
      
            <?php } while ($row_brandssidebar = mysql_fetch_assoc($brandssidebar)); ?>

          
       
      </ul>
      </nav>
          
    <div class="navbar navbar-inverse navbar-fixed-top">      
        
  House of Sale</a> <a href="http://houseofsale.co.uk/results.php?keyword=Dresses" class="navbar-brand">Dresses</a> | <a href="http://houseofsale.co.uk/results.php?keyword=shoes" class="navbar-brand">Shoes</a> |<a href="http://houseofsale.co.uk/results.php?keyword=Jeans"class="navbar-brand">Jeans</a> |<a href="http://houseofsale.co.uk/results.php?keyword=Tops" class="navbar-brand">Tops</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Boots" class="navbar-brand">Boots</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Knitware" class="navbar-brand">Knitware</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Shirts" class="navbar-brand">Shirts</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Skirts" class="navbar-brand">Skirts</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Jackets" class="navbar-brand">Jackets</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Sale" class="navbar-brand">Sale</a>
| <a href="http://houseofsale.co.uk/offers.php?ptype=12" class="navbar-brand">Vouchers and Offers</a>
<form name="form1" style="margin-left:10px;" method="get" action="./results.php?&keyword=">
    <label for="search"></label>
    <input name="keyword" type="text" id="keyword" value="" placeholder="Search..." size="20">
    
    <button type="submit" class="btn btn-default">
                                    <span class="fa fa-search"></span>
                                </button>
     </form>
        <div class="navbar-header pull-right">
          <a id="nav-expander" class="nav-expander fixed">
            MENU &nbsp;<i class="fa fa-bars fa-lg white"></i>
          </a>
        </div>
    </div>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
      <h1>Coupons and Voucher Codes </h1>
      <p> Browse through coupons and special offers click "redeem" to claim your offer</p>
   <div id="tags" style="margin:0 auto; width:960px;text-align:center; "><a href="?ptype=13" class="btn-group">Free Delivery</a> • <a href="?ptype=12" class="btn-group">£ Off</a> • <a href="?ptype=11" class="btn-group">Percent Off</a> •<a href="?ptype=4" class="nav-pills"> Combination Savings </a>• <a href="?ptype=7" class="nav-pills">Gift with Purchase</a></div>
        <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
     

      <?php


  $request_url = apache_getenv("HTTP_HOST") . apache_getenv("REQUEST_URI");





            # INSTANTIATE CURL.
            $curl = curl_init();

            # CURL SETTINGS.
            curl_setopt($curl, CURLOPT_URL, "http://couponfeed.linksynergy.com/coupon?token=4acca9e0828906b9c844db7474c1db8ce6c652a873a8c625550cb57000808f5c&network=3&promotiontype=".$promotion."&resultsperpage=100&pagenumber=1");

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
                   <div class=\"coupon\">
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
           <h2 style="float:left">
     No Items Available</h2>

         </div><!-- /container -->
 </div>
     

      <hr>

      <footer  class="up" style="position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #000; color: #98C93C; text-align: center;">
      <a class="scrollup" href="#up">
           <i class="fa fa-angle-up" style="font-size:36px;"></i></a>
  <i class="fa fa-copyright"></i> © House of Sale 2014
      </footer>
  
    
    
    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="js/jquery.navgoco.js"></script>
    <script src="js/main.js"></script>
    
    <script>
    $(document).ready(function(){												
       
       //Navigation Menu Slider
        $('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});
      	
      	
      	// Initialize navgoco with default options
        $(".main-menu").navgoco({
            caret: '<span class="caret"></span>',
            accordion: false,
            openClass: 'open',
            save: true,
            cookie: {
                name: 'navgoco',
                expires: false,
                path: '/'
            },
            slide: {
                duration: 300,
                easing: 'swing'
            }
        });
  
        	
      });
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

<script language="javascript" type="text/javascript">
function showHide(shID) {
   if (document.getElementById(shID)) {
      if (document.getElementById(shID+'-show').style.display != 'none') {
         document.getElementById(shID+'-show').style.display = 'none';
         document.getElementById(shID).style.display = 'block';
      }
      else {
         document.getElementById(shID+'-show').style.display = 'inline';
         document.getElementById(shID).style.display = 'none';
      }
   }
}
</script>



 
   
    </body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($tops);

mysql_free_result($skirts);

mysql_free_result($Jackets);

mysql_free_result($shoes);

mysql_free_result($Trousers);

mysql_free_result($Sale);

mysql_free_result($Brands);

mysql_free_result($keywords);

mysql_free_result($brandssidebar);
?>
