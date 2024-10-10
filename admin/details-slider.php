<?php
  include('connection.php');
  
  // Get the ID from URL
  $slider_id = $_GET['id'];

  // Fetch the slider details from the database
  $query = "SELECT * FROM sliderlist WHERE id='$slider_id'";
  $result = $con->query($query);
  
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $description = $row['description'];
    $img = $row['img'];
  } else {
    echo "<script>alert('Slider not found'); window.location.href='sliderlist.php';</script>";
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Details - <?php echo $title; ?></title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        width: 90%;
        max-width: 800px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        font-size: 1.2rem;
        color: #333;
    }

    td {
        font-size: 1rem;
        color: #555;
    }

    .unterline {
        border-bottom: 1px solid black;
    }

    h1 {
        text-align: center;
        color: #2492ff;
        text-decoration: underline;
        text-decoration-color: #2492ff;
    }

    img {
        max-width: 100%;
        border-radius: 8px;
    }

    .back-btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        display: inline-block;
    }

    .back-btn:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1>Slider Details</h1>

        <table>
            <tr>
                <th><u>Title:</u></th>
            </tr>
            <tr>
                <td class="unterline"><?php echo $title; ?></td>
            </tr>
            <tr>
                <th><u>Description:</u></th>
            </tr>
            <tr>
                <td class="unterline"><?php echo $description; ?></td>
            </tr>
            <tr>

            </tr>
            <tr>
                <td><img src="./img/<?php echo $img; ?>" alt="<?php echo $title; ?>"></td>
            </tr>
        </table>

        <div style="text-align: center;">
            <a class="back-btn" href="slider.php">Back to Sliders</a>
        </div>
    </div>

</body>

</html>