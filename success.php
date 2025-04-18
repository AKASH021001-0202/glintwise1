<?php
// Define the file to store visitor count
$file = "counter.txt";

// Check if the file exists, if not, create it with an initial value of 0
if (!file_exists($file)) {
    file_put_contents($file, "0");
}

// Read the current count
$count = (int) file_get_contents($file);

// Increment the count
$count++;

// Save the new count back to the file
file_put_contents($file, $count);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <style>
        body {
            text-align: center;
            padding: 40px 0;
            background: #EBF0F5;
        }
        h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
        }
        p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size: 20px;
            margin: 0;
        }
        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left: -15px;
        }
        .card {
            background: white;
            padding: 60px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="card">
        <div style="border-radius: 200px; height: 200px; width: 200px; background: #F8FAF5; margin: 0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>We received your purchase request;<br> we'll be in touch shortly!</p>
        <p style="margin-top: 20px; font-weight: bold;">Visitor Count: <span><?php echo $count; ?></span></p>
    </div>
</body>
<script>
    const successPageCount = <?php echo $count; ?>;
    console.log(successPageCount);
</script>
<script src="assets/js/script.js"></script>
</html>
