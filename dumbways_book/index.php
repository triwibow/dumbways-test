<?php
    require('src/db/db.php');
    $posts = getData("SELECT * FROM book_tb");
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
        <div class="content">
            <?php foreach($posts as $post): ?>
                <div class="post">
                    <img src="assets/img/<?php echo $post["img"];?>">
                    <h2><?php echo $post["name"] ?></h2>
                    <a href="update.php?id=<?php echo $post["id"]; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $post["id"]; ?>">Delete</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>