
<?php
$conn = oci_connect('nliang', '12345Jxtsz', '//oracle.engr.scu.edu:/db11g');
 if($conn) {
    print "<br> connection successful"; 
} else {
    $e = oci_error;
    print "<br> connection failed:";
    print htmlentities($e['message']); exit;
} 
?>
<!-- 'hostname:port/dbname' -->
<!-- Driver type: Thin
        
        Host: db.engr.scu.edu
        TCP Port: 1521
        SID: db11g
        DB name: <your oracle username> DB password: <your oracle password>
         -->