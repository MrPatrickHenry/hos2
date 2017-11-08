<section id="trendingprod" data-index="3">
<div class="container">
  <h2>Trending <?php echo $keyword;?> items in <?php echo utf8_decode(urldecode("$city")); ?> </h2>

   <?php
   # INSTANTIATE CURL.
   $curl = curl_init();

            # CURL SETTINGS.
   curl_setopt($curl, CURLOPT_URL, "http://productsearch.linksynergy.com/productsearch?token=236d1dc17debf34c78c420ecc0b61cbc23e32ab9b4651e3e883406fbe35b7899&keyword=%22".$keyword."%22&cat=%22women%22&MaxResults=10&pagenumber=1");

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
        <strong>{$item -> productname}</strong>
        <a href =\"{$item -> linkurl}\"/> <img class=\"images, addthis_shareable\" src=\"{$item -> imageurl}\"/></a>

          <h4>Description</h4> <span>

          {$item -> description -> short}</span><br>

          <strong>Price: $ {$item -> price}</strong>


          <a class=\"btn btn-default btn-block\" onClick=\"ga('send', 'event', 'interest', 'clickbuy', 'clickbuysite', 5);\"  href =\"{$item -> linkurl}&amp;u1=site\"/>Buy</a>
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

</div>
</section>