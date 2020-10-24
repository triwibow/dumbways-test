<?php
    require('src/db/db.php');
    $data = getDataById($_GET["id"])[0];
    $categories = getData("SELECT * FROM category_tb");
    $writers = getData("SELECT * FROM writer_tb");

    if(isset($_POST["edit"])){
        $edit = editData($_POST);
        if($edit > 0){
            echo "
                <script>
                    alert('buku berhasil diupdate');
                    document.location.href='index.php';
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
            <h3>Update Buku</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $data["id"]?>" name="id">
                <label>Nama</label>
                <input type="text" name="name" value="<?php echo $data["name"]; ?>"/>

                <label>Kategori</label>
                <select name="category_id">
                    <?php foreach($categories as $category): ?>
                        <option
                        <?php if($category["id"] == $data["category_id"]){ echo "selected";} ?>
                         value="<?php echo $category["id"]?>"><?php echo $category["name"]?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label>Penulis</label>
                <select name="writer_id">
                    <?php foreach($writers as $writer): ?>
                        <option
                            <?php if($writer["id"] == $data["writer_id"]){ echo "selected";} ?>
                            value="<?php echo $writer["id"]?>"><?php echo $writer["name"]?>
                        </option>
                    <?php endforeach; ?>
                </select>
                
                <label>Tahun Publikasi</label>
                <input type="text" name="Publication_year" value="<?php echo $data["Publication_year"]; ?>"/>

                <label>Sampul</label>
                <img src="assets/img/<?php echo $data["img"];?>">

                <button type="submit" name="edit">Edit</button>
            </form>
        </div>
    </main>
</body>
</html>