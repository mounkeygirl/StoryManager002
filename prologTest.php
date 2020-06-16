
    <?php
    session_start();
    include_once("php/basic.php");
    loadHeader("Prolog Test");
    ?>

    <H1>Calling SWI-Prolog from PHP (short)</H1>

<?
  $cmd = "nice -n15 C:/Program Files/swipl/bin/swipl-win.exe -f prolog/swipl-win.exe -g test,halt";
?>

<P>
<PRE>
<?
  system( $cmd );
  echo "\n";

  $output = exec( $cmd );
  echo $output;
  echo "\n";

  exec( $cmd, $output );
  print_r( $output );
  echo "\n";

  $output = shell_exec( $cmd );
  echo $output;
  echo "\n";
?>
</PRE>
</P>

<?php include_once("tail.php") ?>
