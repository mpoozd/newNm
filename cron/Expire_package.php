<?php 
set_time_limit(0);
$req = curl_init();
curl_setopt($req, CURLOPT_URL,"http://www.smartlancers.com/Cron_job/index");
curl_exec($req);