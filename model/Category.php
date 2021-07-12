<?php
if (!class_exists('Database')) {
    include('connect.php');
}

class Category extends Database
{
    function getAllCategory()
    {
        $sql = "SELECT * FROM productcategory;";

        return $this->con->query($sql);
    }
    function storeCategory($newCat)
    {
        $sql = "INSERT INTO productcategory (CategoryName) VALUE ('$newCat');";

        $this->con->query($sql);
        header('Location: AddProduct.php');
    }
}

$Category = new Category();

if (isset($_GET['func'])) {
    switch (htmlspecialchars($_GET['func'])) {
        case 'createcategory':
            if (isset($_POST['addcategory'])) {
                $newcat = $_POST['newcat'];

                $Category->storeCategory($newcat);
            }
            break;
    }
}
