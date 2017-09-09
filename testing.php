<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>


 <?php
function send_request($rest){
        global $rootpath;
        $ch                     = curl_init();
        $timeout                = 5; // set to zero for no timeout
        curl_setopt ($ch, CURLOPT_URL, $rest);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents  = @curl_exec($ch);
        curl_close($ch);
        return $file_contents;
}

$count= false;
$url= 'http://popshops.com/v3/products.xml?catalog=06h9rhk063ez05bjfeq6pq0t8&account=2me8nx0tm8q0919dr5qr9nzmu';
$rss_feed                               = send_request($url);
if(strlen(trim($rss_feed)) > 0){
        $resp                           = simplexml_load_string($rss_feed);
        foreach($resp->product as $item) {
                $count                  = true;
                echo $item->name."";
                echo $item->price."";
                echo $item->description."";
                echo $item->url."";
                echo $item->large_image_url."";
                echo "";
        }
}
if(!$count){
        echo 'no records found';
}
?>
 


</body>
</html>