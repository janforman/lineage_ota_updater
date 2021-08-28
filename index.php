<?php
$url = 'https://'.$_SERVER['HTTP_HOST'].'/lineageos/';
if($_GET['device'] == 'kingdom') {
	$dir = 'kingdom';
	$version = '16.0';
}
if($_GET['device'] == 'YTX703F') {
	$dir = 'YTX703F';
	$version = '16.0';
}
if($_GET['device'] == 'YTX703L') {
	$dir = 'YTX703L';
	$version = '16.0';
}
$files = array_diff(scandir($dir,1), array('..', '.'));
$file = $files[0];
if ($version && $file)
{
echo '{
  "response": [
    {
      "datetime": ' . filemtime($dir . '/' . $file). ',
      "filename": "' . $file . '",
      "id": "' . md5($file). '",
      "romtype": "UNOFFICIAL",
      "size": ' . filesize($dir . '/' . $file). ',
      "url": "'.$url.$dir.'/' . $file . '",
      "version": "' . $version . '"
    }
  ]
}
';
}
else die('{"response": [{}]}');
