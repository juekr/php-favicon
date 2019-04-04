<?php

  $char = rand(0,128);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Test</title>
    <link href="favicon.php?char=<?php echo $char; ?>" rel="icon" type="image/png">
  </head>
  <body>
    <pre>
            
      Reload this Page several times ;-)
       
      <img src="favicon.php?char=<?php echo $char; ?>">

    </pre>
  </body>
</html>
