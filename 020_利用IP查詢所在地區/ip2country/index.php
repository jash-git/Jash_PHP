<?php
header('content-type:text/html;charset=utf-8');
function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
	$ip = $_SERVER['HTTP_CLIENT_IP'];
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
	$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
}else
{
	$ip = $_SERVER['REMOTE_ADDR'];
}
echo "www.geoplugin.net API:<br>";
echo ip_info($ip, "Country")."<br>"; // United States
echo ip_info($ip, "Country Code")."<br>"; // US
echo ip_info($ip, "State")."<br>"; // California
echo ip_info($ip, "City")."<br>"; // Menlo Park
echo ip_info($ip, "Address")."<br>"; // Menlo Park, California, United States
print_r(ip_info($ip, "Location"))."<br>"; // Array ( [city] => Menlo Park [state] => California [country] => United States [country_code] => US [continent] => North America [continent_code] => NA )
echo "-----------------------------------<br>";
echo"PHP GeoIPLocation Library:<br>";
include("geoiploc.php"); // Must include this

  // ip must be of the form "192.168.1.100"
  // you may load this from a database
  $ip = $_SERVER["REMOTE_ADDR"];
  echo "Your IP Address is: " . $ip . "<br />";

  echo "Your Country is: ";
  // returns country code by default
  echo getCountryFromIP($ip);
  echo "<br />\n";

  // optionally, you can specify the return type
  // type can be "code" (default), "abbr", "name"

  echo "Your Country Code is: ";
  echo getCountryFromIP($ip, "code");
  echo "<br />\n";

  // print country abbreviation - case insensitive
  echo "Your Country Abbreviation is: ";
  echo getCountryFromIP($ip, "AbBr");
  echo "<br />\n";

  // full name of country - spaces are trimmed
  echo "Your Country Name is: ";
  echo getCountryFromIP($ip, " NamE ");
  echo "<br />\n";

?>