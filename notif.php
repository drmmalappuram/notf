<!Doctype Html>  
<html> <title>   
Use a Php in Html  
</title>  
</head>  
<body>  
<?php
$url = 'https://fcm.googleapis.com/fcm/send';
$serverkey = 'AAAAb0o5kVo:APA91bE1L7ZGj8K-pSm2MgUY4EB30mhZIKgGrmY9UacJS4vtDsLfUVHfsewdwGL7G0CSC6tNauOn3hFVXVfT9LjB1odng9d-1wA5Ig7oUB-W217hmNdB0SHewV_5kUI9t1hKlLa4Illz';

$fields = array(
	  'to' => "/topics/all", //target topic recievers
	  'data' => array(
			       'title'=>'Welcome to FlutterCampus',
					'body'=>"Hello this notification is from Flutter App.",
					'image'=>'https://www.fluttercampus.com/img/uploads/web/2021/02/c4ca4238a0b923820dcc509a6f75849b.webp'
	        )
);

$headers = array('Authorization:key='.$serverkey,'Content-Type:application/json');
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result) {
  echo "success";
  
}else{
  die('Curl failed: ' . curl_error($ch));
}
curl_close($ch);

?>
</body>
</html>   