<?php
    require 'StrUtils.php';

    $mystr = new StrUtils('php is awesome !');
    //echo $mystr->str; 
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
     
    <?php echo $mystr->bold();?> <br>
    <?php echo $mystr->italic();?> <br>
    <?php echo $mystr->underline();?> <br>
    <?php echo $mystr->capitalize();?> <br><br>
    <?php echo $mystr->uglify();?> <br>
    <?php //echo $mystr->bold();?> <br>
  </div>
</body>
</html>
