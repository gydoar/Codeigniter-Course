<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User view</title>
</head>

<body>

    <h1>

        <?php

        // echo $results;
        foreach ($results as $object) {
            echo $object->username . "<br>";
        }
        ?>
    </h1>


</body>

</html>