<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



   <h3><?php echo $title;?></h3>
<p>
  <?php
     foreach ($data as $key => $value) {
         # code...
         echo '* '.$key.' : '.$value.'<br>';
     }
    ?>

</p>

</body>
</html>