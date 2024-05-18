<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $students = [["Zayan","2KS1","PHP"],["Wida","2KS1","JavaScript"]];
    ?>
    <?php foreach($students as $student) :?>
        <h3>Mahasiswa</h3>
        <ul>
            <?php foreach($student as $identity) :?>
                <li><?= $identity?></li>
            <?php endforeach ?>
        </ul>
    <?php endforeach ?>
</body>
</html>