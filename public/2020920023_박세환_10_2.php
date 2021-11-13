<?php 
    session_start ();
    print "id:" . $_SESSION['id'] . "<br>";
    print "pw:" . $_SESSION['pw'] . "<br>";
    print "height:" . $_SESSION['height'];
    print "<br>4)<br>";
    var_dump($_SESSION);
    

?>  