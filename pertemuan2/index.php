<?php 
   //perulangan di php sama aja kaya di JS cuma variabelnya dikasi $
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .warnagenap{
            background-color: red;
        }
    </style>
</head>
<body>
    <table border="1" cellpadding ="10" cellspacing="0">
        <?php for ($i=0; $i <= 5 ; $i++) : ?>
            <?php if ($i % 2 == 0) : ?>
                <tr class ="warnagenap">
            <?php else : ?>
                <tr>
            <?php endif?> 
                    <?php for ($j=0; $j <= 5 ; $j++) : ?>
                        <td><?= $i, $j; ?></td>
                        <!-- sama aja kaya echo -->
                    <?php endfor?>
            </tr>          
        <?php endfor ?>
    </table>
</body>
</html>