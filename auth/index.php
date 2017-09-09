<?php
$authcode = $_GET['code']
?>
<?php
$ch = curl_init();
curl_setopt($ch, curlopt_url, "https://jawbone.com/auth/oauth2/token?client_id=tcL7KXen97w&client_secret=e71b79c545d7869d5b9005841b6c500d66a1f00e&grant_type=authorization_code&code=$authcode");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
curl_exec($ch);
curl_close($ch);

?>

