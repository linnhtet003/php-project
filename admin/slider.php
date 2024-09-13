<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Image and Button Resize Hover Effect</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    table {
        width: 100%;
        max-width: 1000px;
        margin: 0 auto;
        border-collapse: collapse;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        font-size: 14px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    td {
        font-size: 14px;
        color: #333;
    }

    img {
        max-width: 80px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.3s ease;
        /* Smooth transition for image resize */
    }

    img:hover {
        transform: scale(1.2);
        /* Resize image to 120% of its original size on hover */
    }

    caption {
        margin-bottom: 10px;
        font-size: 30px;
        font-weight: bold;
        color: #4CAF50;
    }

    td.description {
        color: #777;
        font-style: italic;
    }

    .action-btn {
        padding: 8px 12px;
        margin: 0 5px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: transform 0.3s ease;
        /* Smooth transition for button resize */
    }

    .action-btn:hover {
        transform: scale(1.1);
        /* Resize button to 110% of its original size on hover */
    }

    .view-btn {
        background-color: #4CAF50;
    }

    .edit-btn {
        background-color: #FFA500;
    }

    .delete-btn {
        background-color: #FF6347;
    }
    </style>
</head>

<body>

    <table>
        <caption>The Slider List</caption>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        <?php
            error_reporting(1);
            include('connection.php');
            $i = 1;
            $data = "SELECT * FROM sliderlist ORDER BY id DESC";
            $val = $con->query($data);
            if ($val->num_rows > 0){
              while(list($id,$title,$description,$img) = mysqli_fetch_array($val)){
                echo "<tr>";
                echo "<td>".$i++."</td>";
            echo "<td>".$title."</td>";
            echo "<td class='description'>".$description."</td>";
            echo "<td><img src='./img/$img' width='100' 
                          style='border-radius:20px;' /></td>";
            echo "<td>";
                echo "<button class='action-btn view-btn'>View</button>";
                echo "<button class='action-btn edit-btn'>Edit</button>";
                echo "<button class='action-btn delete-btn'>Delete</button>";
            echo "</td>";
        echo "</tr>";
              }
            }else{
              echo "<h1 colspan='8'><b>No data available</b></h1>";
            }
          ?>

    </table>

</body>

</html>