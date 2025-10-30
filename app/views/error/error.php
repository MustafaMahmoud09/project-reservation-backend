<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <style>
        body{
            background-color: rgb(22, 21, 21);
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
        }
        h1{
            color: white;
            font-size: 20px;
            font-weight: 550;
        }
    </style>
</head>
<body>
    <h1>An error occurred while performing this operation | <?php echo $eNumber? $eNumber:'';?></h1>
</body>
</html>