<?php
    require('src/db/db.php');
    
    if(isset($_POST["submit"])){
       $add = addWriter($_POST);
       if($add > 0) {
        echo "
             <script>
                 alert('penulis berhasil ditambahkan');
             </script> 
        ";
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dumbways Book</title>
    <link rel="stylesheet" href="assets/style/style.css">
</head>
<body>
    <header>
        <nav>
            <h1>Dumbways Book</h1>
            <ul>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="add.php">Add Book</a>
                </li>
                <li>
                    <a href="add-category.php">Add Category</a>
                </li>
                <li>
                    <a href="add-writer.php">Add Writer</a>
                </li>
                
            </ul>
        </nav>
    </header>

    <main>
        <div class="add">
            <h3>Tambah penulis</h3>
            <form action="" method="post">
                <label>Nama Penulis</label>
                <input type="text" name="name" autocomplete="off" />
                <button type="submit" name="submit">Tambah</button>
            </form>
        </div>
    </main>
</body>
</html>