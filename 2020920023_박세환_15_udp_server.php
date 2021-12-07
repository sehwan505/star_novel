<?PHP

$addr = gethostbyname('127.0.0.1');
$port = 5555;
$buf = "";

$sock = socket_create(AF_INET, SOCK_DGRAM, 0);
if($sock < 0)	die(socket_strerror($sock));

if(($ret = socket_bind($sock, $addr, $port)) < 0)	die(socket_strerror($ret));

do
{
	$read = socket_recvfrom($sock, $buf, 2048, 0, $addr, $port);
	echo "Receive data : $buf <br>";

	$temp = preg_split("/\s+/", $buf);
	sort($temp);
	
	for($i = count($temp) - 1; $i >= 0; $i--)
	{
		$resp .= $temp[$i] ." ";
	}
	
	$send = socket_sendto($sock, $resp, strlen($resp), 0, $addr, $port);
	echo "Send data : $resp <br>";
} while($read < 0);

socket_close ($sock);
?>