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
                        echo "<script>window.location.href = 'slider.php'</script>";
                    } else {
                        echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
                    }
                }

            ?>
        <form method="POST" enctype="multipart/form-data">


            <div class="input-container ic1">
                <input id="title" class="input" name="title" type="text" placeholder=" " required />
                <div class="cut"></div>
                <label for="title" class="placeholder">Title:</label>
            </div>
            <div class="input-container-2 ic2">
                <textarea id="description" class="input" name="description" type="text" placeholder=" "
                    required></textarea>
                <div class="cut"></div>
                <label for="description" class="placeholder">Description:</label>
            </div>

                <div class="drag-drop">
                    <div id="drop-zone" class="drop-zone">
                        <p>Drag & Drop an image here</p>
                    </div>
                    <input type="file" id="file-input" accept="image/*" name="image" style="display: none;" required />
                </div>

            <div class="drag-drop">
                <button type="text" name="sub" class="submit">Submit</button>
            </div>

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
        margin-top: 10px;
        background-color: #15172b;
        border-radius: 20px;
        box-sizing: border-box;
        height: auto;
        padding: 20px;
        width: 520px;
    }

    /* drag and drop */

    .drag-drop{
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }

    .drop-zone {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        display: flex;
        color: #65657b;
        justify-content: center;
        align-items: center;
        background-color: #303245;
    }

    .drop-zone.hover {
        border-color: #0b76ef;
    }

    .drop-zone img {
        max-width: 100%;
        max-height: 100%;
    }

    /* end drag and drop */

    .title {
        color: #eee;
        font-family: sans-serif;
        font-size: 36px;
        font-weight: 600;
        margin-top: 30px;
        text-align: center;
    }

    .subtitle {
        color: #eee;
        font-family: sans-serif;
        font-size: 16px;
        font-weight: 600;
        margin-top: 10px;
        text-align: center;
    }

    .input-container {
        height: 50px;
        position: relative;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        width: 100%;
    }

    .input-container-2 {
        height: 120px;
        position: relative;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
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
        background-color: #25618f;
        border-radius: 5px;
        border: 0;
        box-sizing: border-box;
        color: #eee;
        cursor: pointer;
        font-size: 18px;
        height: 50px;
        // outline: 0;
        transition: 0.7s ease;
        text-align: center;
        width: 80%;
    }

    .submit:hover {
        background-color: #108be8;
        color: #5f4899;
        border-radius: 12px;
    }

    .submit:active {
        background-color: #09b;
    }
    </style>

    <script>
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');

    // Add event listeners for drag and drop functionality
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('hover');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('hover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.classList.remove('hover');

        const files = e.dataTransfer.files;
        if (files.length && files[0].type.startsWith('image/')) {
            handleFileUpload(files[0]);
        }
    });

    // Trigger file input when drop zone is clicked
    dropZone.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            handleFileUpload(file);
        }
    });

    // Function to handle file upload and display
    function handleFileUpload(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const img = document.createElement('img');
            img.src = e.target.result;
            dropZone.innerHTML = '';
            dropZone.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
    </script>

</body>

</html>