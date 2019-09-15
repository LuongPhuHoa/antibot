<?php 
error_reporting(0);
$url            = "https://antibot.pw/downloads/antibot.zip";
$zipFile        = "antibot.zip"; 
$zipResource    = fopen($zipFile, "w");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FAILONERROR, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_FILE, $zipResource);
$page = curl_exec($ch);

if(!$page) {
    die("Error :- ".curl_error($ch));
}
curl_close($ch);

unlink('.htaccess');

$zip = new ZipArchive;
$extractPath = __DIR__;
if($zip->open($zipFile) != "true"){
     die("Error :- Unable to open the Zip File"); 
}
$zip->extractTo($extractPath);
$zip->close();

$version = file_get_contents("version.txt");
if($version){
    echo "AntiBot Installers Success (".$version.")";
}else{
    echo "AntiBot Installers Success";
}
