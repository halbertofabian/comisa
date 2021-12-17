<?php


include_once 'config.php';

preArray(DOCUMENT_ROOT);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, HTTP_HOST . 'api/public/prueba_cron');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$res = curl_exec($ch);
curl_close($ch);
