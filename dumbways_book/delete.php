<?php
require('src/db/db.php');
$id = $_GET["id"];

$delete = delete($id);

if($delete > 0){
    echo "
              <script>
                    alert('data berhasil dihapus');
                    document.location.href='index.php';
                </script> 
           ";
}

