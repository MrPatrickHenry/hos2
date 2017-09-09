<?php
	
$name= $_GET["name"];
$keyword = $_GET["keyword"]; // Define the text
$mid= $_GET["mid"];
?>


<!DOCTYPE html>
<html lang="en"><head>
  <meta charset="UTF-8">
<meta name='description' content='House of Sale lets you browse the highstreet stores sales, at the ease of your pc laptop mobile device, high street, skirts, shoes, jackets, trousers, offers '>
            <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-21590892-20', 'auto');
  ga('send', 'pageview');

</script>
	<meta name='robots' content='index, follow'>
<meta name='author' content='HouseOfSale'>
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
          
    <div class="navbar navbar-inverse navbar-fixed-top"><a style="font-family: 'EB Garamond', serif;"class="navbar-brand" href="http://houseofsale.co.uk">House of Sale</a> <a href="http://houseofsale.co.uk/results.php?keyword=Dresses" class="navbar-brand">Dresses</a> | <a href="http://houseofsale.co.uk/results.php?keyword=shoes" class="navbar-brand">Shoes</a> |<a href="http://houseofsale.co.uk/results.php?keyword=Jeans"class="navbar-brand">Jeans</a> |<a href="http://houseofsale.co.uk/results.php?keyword=Tops" class="navbar-brand">Tops</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Boots" class="navbar-brand">Boots</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Knitware" class="navbar-brand">Knitware</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Shirts" class="navbar-brand">Shirts</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Skirts" class="navbar-brand">Skirts</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Jackets" class="navbar-brand">Jackets</a> | <a href="http://houseofsale.co.uk/results.php?keyword=Sale" class="navbar-brand">Sale</a>
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
        <h1>&nbsp;</h1>
     

      <?php







            # INSTANTIATE CURL.
            $curl = curl_init();

            # CURL SETTINGS.
            curl_setopt($curl, CURLOPT_URL, "http://productsearch.linksynergy.com/productsearch?token=4acca9e0828906b9c844db7474c1db8ce6c652a873a8c625550cb57000808f5c&keyword=%22".$keyword."%22&cat=%22%22&MaxResults=20&pagenumber=1");





curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);

            # GRAB THE XML FILE.
            $xml = curl_exec($curl);

            curl_close($curl);

            # SET UP XML OBJECT.
            $xmlObj = simplexml_load_string( $xml );

            $tempCounter = 0;

            foreach ( $xmlObj->item as $item )
            {                    
                # DISPLAY ONLY 10 ITEMS.
                if ( $tempCounter < 120 )
                {
                   echo "
				        <div class=\"grid\">
                   <div class=\"imgholder\">
                <strong> ".$name." {$item -> productname}</strong>
                   <a href =\"{$item -> linkurl}\"/> <img class=\"images, addthis_shareable\" src=\"{$item -> imageurl}\"   
	addthis:url=\"       
	".$request_url."
	 \" addthis:title=\"     \" 
				   
				   
				   /></a>
				   
				   <h3>Description</h3> <span>
				   
				   {$item -> description -> short}</span><br>
				   
                   <strong>Price: £{$item -> price}</strong>

				   
				<a class=\"link\"   href =\"{$item -> linkurl}&amp;u1=site\"/>Buy</a>
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
