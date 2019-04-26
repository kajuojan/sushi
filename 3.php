<?php


$index = "https://allowweb.com/supersatoshi/index.php/dashboard";
$desable = "https://allowweb.com/supersatoshi/index.php/dashboard/getDesabledButtons";
$addpoint = "https://allowweb.com/supersatoshi/index.php/balance/addPoint";


$headers = array();
$headers[] = "x-requested-with: XMLHttpRequest";
$headers[] = "user-agent: Mozilla/5.0 (Linux; Android 6.0.1; Redmi 3S Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 Mobile Safari/537.36";
$headers[] = "content-type: application/x-www-form-urlencoded; charset=UTF-8";
$headers[] = "cookie: __cfduid=dae31c4678fd84d2223a4fbca6467135d1555326019";
$headers[] = "cookie: _ga=GA1.2.1390488660.1555326022";
$headers[] = "cookie: _gid=GA1.2.70084765.1556189541";
$headers[] = "cookie: ci_session=l1qq4jkbgjlsorodd7a75c7qn83pa0ha";
$headers[] = "cookie: _gat_gtag_UA_27145904_51=1";


function res($desable, $headers, $index){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $desable);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $index);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    $result = curl_exec($ch);
    curl_close($ch);

}

function claim($addpoint){
  $no = array("1","2","3","4","5");
  foreach($no as $data1){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $addpoint);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_REFERER, $index);
    $ua = array();
    $ua[] = "user-agent: Mozilla/5.0 (Linux; Android 6.0.1; Redmi 3S Build/MMB29M; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/66.0.3359.126 Mobile Safari/537.36";
    $ua[] = "cookie: __cfduid=dae31c4678fd84d2223a4fbca6467135d1555326019";
    $ua[] = "cookie: _ga=GA1.2.1390488660.1555326022";
    $ua[] = "cookie: _gid=GA1.2.70084765.1556189541";
    $ua[] = "cookie: ci_session=l1qq4jkbgjlsorodd7a75c7qn83pa0ha";
    $ua[] = "cookie: _gat_gtag_UA_27145904_51=1";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $ua);
    curl_setopt($ch, CURLOPT_POST, 1);
    $data["id"] = $data1;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $result = curl_exec($ch);
    curl_close($ch);
    $json = json_decode($result, true);
    echo "Message : ".$json["message"]." | Ballance : ".$json["pointBalance"]."\n";
    sleep(5);
   }
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $index);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
curl_close($ch);
$one = explode('<b  id="pointBalance">', $result);
$two = explode('</b>', $one[1]);
echo "Ballance : ".$two[0]." Point\n";



echo "\n\n\nStar Claiming......!\n";
while (True){
    res($desable, $headers, $index);
    claim($addpoint, $headers, $no);
sleep(360);
}

?>