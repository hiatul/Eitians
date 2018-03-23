<!--<!DOCTYPE html>

To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//$user_ip = getenv('REMOTE_ADDR');
//$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
//$country = $geo["geoplugin_countryName"];
//$city = $geo["geoplugin_city"];
//
//echo $user_ip;
//echo $city;
?>
        
        <?php
////include('ip2locationlite.class.php');
////  $command="/sbin/ifconfig eth0 | grep 'inet addr:' | cut -d: -f2 | awk '{ print $1}'";
////$localIP = exec ($command);
////echo $localIP;
//////Load the class
////$ipLite = new ip2location_lite;
////$ipLite->setKey('d4e4627794dc1e11217a83af82df08e0585e1c6d7f33d66188b3f8a2fbe9ca0b');
//// 
//////Get errors and locations
////$locations = $ipLite->getCity($localIP);
////$errors = $ipLite->getError();
//// 
//////Getting the result
////echo "<p>\n";
////echo "<strong>First result</strong><br />\n";
////if (!empty($locations) && is_array($locations)) {
////  foreach ($locations as $field => $val) {
////    echo $field . ' : ' . $val . "<br />\n";
////  }
//}
//echo "</p>\n";
// 
////Show errors
//echo "<p>\n";
//echo "<strong>Dump of all errors</strong><br />\n";
//if (!empty($errors) && is_array($errors)) {
//  foreach ($errors as $error) {
//    echo var_dump($error) . "<br /><br />\n";
//  }
//} else {
//  echo "No errors" . "<br />\n";
//}
//echo "</p>\n";
?>
        
        	
//<?php    
//function get_client_ip() {
//        $ipaddress = '';
//        if (isset($_SERVER['HTTP_CLIENT_IP']))
//            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
//        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
//            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
//        else if(isset($_SERVER['HTTP_X_FORWARDED']))
//            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
//        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
//            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
//        else if(isset($_SERVER['HTTP_FORWARDED']))
//            $ipaddress = $_SERVER['HTTP_FORWARDED'];
//        else if(isset($_SERVER['REMOTE_ADDR']))
//            $ipaddress = $_SERVER['REMOTE_ADDR'];
//        else
//            $ipaddress = 'UNKNOWN';
//        return $ipaddress;
//    }
// $PublicIP = get_client_ip(); 
// $json  = file_get_contents("https://freegeoip.net/json/$PublicIP");
// $json  =  json_decode($json ,true);
// $country =  $json['country_name'];
// $region= $json['region_name'];
// $city = $json['city'];
// 
// echo $country;
//
//?>


<script type="text/javascript">

if (navigator.geolocation) {
  var timeoutVal = 10 * 1000 * 1000;
  navigator.geolocation.getCurrentPosition(
    displayPosition, 
    displayError,
    { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0 }
  );
}
else {
  alert("Geolocation is not supported by this browser");
}

function displayPosition(position) {
  alert("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
}

function displayError(error) {
  var errors = { 
    1: 'Permission denied',
    2: 'Position unavailable',
    3: 'Request timeout'
  };
  alert("Error: " + errors[error.code]);
}
</script>
   
   
   
   <?php
//   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//    $ip = $_SERVER['HTTP_CLIENT_IP'];
//} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//} else {
//    $ip = $_SERVER['REMOTE_ADDR'];
//}
//
//echo $ip;
?>
    </body>
</html>-->





 <?php
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

echo $ip;
?>


<?php
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success') {
  echo 'Hello visitor from '.$query['country'].', '.$query['city'].'!';
} else {
  echo 'Unable to get location';
}
?>


<?php
 
class IPAPI {
    static $fields = 65535;     // refer to http://ip-api.com/docs/api:returned_values#field_generator
    static $use_xcache = true;  // set this to false unless you have XCache installed (http://xcache.lighttpd.net/)
    static $api = "http://ip-api.com/php/";
 
    public $status, $country, $countryCode, $region, $regionName, $city, $zip, $lat, $lon, $timezone, $isp, $org, $as, $reverse, $query, $message;
 
    public static function query($q) {
        $data = self::communicate($q);
        $result = new static;
        foreach($data as $key => $val) {
            $result->$key = $val;
        }
        return $result;
    }
 
    private function communicate($q) {
        $q_hash = md5('ipapi'.$q);
        if(self::$use_xcache && xcache_isset($q_hash)) {
            return xcache_get($q_hash);
        }
        if(is_callable('curl_init')) {
            $c = curl_init();
            curl_setopt($c, CURLOPT_URL, self::$api.$q.'?fields='.self::$fields);
            curl_setopt($c, CURLOPT_HEADER, false);
            curl_setopt($c, CURLOPT_TIMEOUT, 30);
            curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
            $result_array = unserialize(curl_exec($c));
            curl_close($c);
        } else {
            $result_array = unserialize(file_get_contents(self::$api.$q.'?fields='.self::$fields));
        }
        if(self::$use_xcache) {
            xcache_set($q_hash, $result_array, 86400);
        }
        return $result_array;
    }
}
 
 
// example
$query = IPAPI::query("google.com");
echo 'Country: '.$query->country.', city: '.$query->city;
 
echo '<br><br>debug: <pre>';
var_dump($query);
echo '</pre>';
 
?>