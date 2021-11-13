<?php 
    session_start ();
    print "1)<br>";
    echo session_save_path() . "<br>";
    echo session_id();
    print "<br>23)<br>";
    $_SESSION['id'] = "홍길동";
    $_SESSION['pw'] = "12345678";
    $_SESSION['height'] = "182.2";

    print "<a href='/2020920023_박세환_10_2.php'>다음페이지</a>";
?>