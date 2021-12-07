<?php

$addr = gethostbyname('127.0.0.1');
$port = 5555;
$data = "사과 오렌지 바나나 배";
$buf1 = "";

$sock = socket_create(AF_INET, SOCK_DGRAM, 0);
if($sock < 0)	die(socket_strerror($sock));
$ret = socket_sendto($sock, $data, strlen($data), 0, $addr, $port);
echo "Send data : $data <br>";
do
{
	$read = socket_recvfrom($sock, $buf1, 2048, 0, $addr, $port);
} while($read < 0);

echo "Receive data : $buf1 <br>";
socket_close($sock);

?>