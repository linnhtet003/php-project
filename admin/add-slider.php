<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Slider</title>
</head>

<body>

    <div class="form">
        <div class="title">Welcome Admin</div>
        <div class="subtitle">Let's create our Slider!</div>

        <?php
        error_reporting(1);
        include('connection.php');
            if(isset($_POST['sub'])) {
                $slider_title=$_POST['title'];
                $slider_desc=$_POST['description'];
                $image=$_FILES["image"]["name"];

                $query=mysqli_query($con, "insert into sliderlist(title,description,img) value('$slider_title','$slider_desc','$image')");

                    if ($query) {
                        move_uploaded_file($_FILES["image"]["tmp_name"],"img/".$image);
                        echo "<script>alert('Slider has been added.');</script>";
                        echo "<script>window.location.href = 'add-slider.php'</script>";
                    } else {
                        echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
                    }
                }

            ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="input-container ic1">
            <input id="title" class="input" name="title" type="text" placeholder=" " required/>
            <div class="cut"></div>
            <label for="title" class="placeholder">Title:</label>
        </div>
        <div class="input-container ic2">
            <input id="description" class="input" name="description" type="text" placeholder=" " required/>
            <div class="cut"></div>
            <label for="description" class="placeholder">Description:</label>
        </div>
        <div id="yourBtn" onclick="getFile()">Click to upload an image</div>
        <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" name="image" required value="upload"
                onchange="sub(this)" /></div>
        <button type="text" name="sub" class="submit">Submit</button>
    </form>
    </div>

    <style>
    body {
        align-items: center;
        background-color: #000;
        display: flex;
        justify-content: center;
        height: 100vh;
    }

    .form {
        background-color: #15172b;
        border-radius: 20px;
        box-sizing: border-box;
        height: 500px;
        padding: 20px;
        width: 320px;
    }

    #yourBtn {
        position: relative;
        margin-top: 30px;
        font-family: calibri;
        color: #65657b;
        width: 200px;
        padding: 13px;
        font-size: 18px;
        -webkit-border-radius: 12px;
        -moz-border-radius: 12px;
        border: 0;
        text-align: center;
        background-color: #303245;
        cursor: pointer;
    }

    .title {
        color: #eee;
        font-family: sans-serif;
        font-size: 36px;
        font-weight: 600;
        margin-top: 30px;
    }

    .subtitle {
        color: #eee;
        font-family: sans-serif;
        font-size: 16px;
        font-weight: 600;
        margin-top: 10px;
    }

    .input-container {
        height: 50px;
        position: relative;
        width: 100%;
    }

    .ic1 {
        margin-top: 40px;
    }

    .ic2 {
        margin-top: 30px;
    }

    .input {
        background-color: #303245;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        font-size: 18px;
        height: 100%;
        outline: 0;
        padding: 4px 20px 0;
        width: 100%;
    }

    .cut {
        background-color: #15172b;
        border-radius: 10px;
        height: 20px;
        left: 20px;
        position: absolute;
        top: -20px;
        transform: translateY(0);
        transition: transform 200ms;
        width: 76px;
    }

    .cut-short {
        width: 50px;
    }

    .input:focus~.cut,
    .input:not(:placeholder-shown)~.cut {
        transform: translateY(8px);
    }

    .placeholder {
        color: #65657b;
        font-family: sans-serif;
        left: 20px;
        line-height: 14px;
        pointer-events: none;
        position: absolute;
        transform-origin: 0 50%;
        transition: transform 200ms, color 200ms;
        top: 20px;
    }

    .input:focus~.placeholder,
    .input:not(:placeholder-shown)~.placeholder {
        transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown)~.placeholder {
        color: #808097;
    }

    .input:focus~.placeholder {
        color: #dc2f55;
    }

    .submit {
        background-color: #08d;
        border-radius: 12px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 50px;
        margin-top: 38px;
        // outline: 0;
        text-align: center;
        width: 100%;
    }

    .submit:active {
        background-color: #06b;
    }
    </style>

    <script>
        function getFile() {
  document.getElementById("upfile").click();
}

function sub(obj) {
  var file = obj.value;
  var fileName = file.split("\\");
  document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
  document.myForm.submit();
  event.preventDefault();
}
    </script>

</body>

</html>