<?php
if (!class_exists('Database')) {
    include('connect.php');
}

class Supplier extends Database
{
    function getAllSupplier()
    {
        $sql = "SELECT * FROM supplierlist;";

        return $this->con->query($sql);
        header('Location: AddProduct.php');
    }
    function storeSupplier($newcomp, $newcont, $newaddr, $newmail, $newphone, $newsite)
    {
        $sql = "INSERT INTO supplierlist (CompanyName, ContactName, Address, Email, Phone, Website) 
        VALUE ('$newcomp', '$newcont', '$newaddr', '$newmail', '$newphone', '$newsite');";

        $this->con->query($sql);
        header('Location: AddProduct.php');
    }
}

$Supplier = new Supplier();

if (isset($_GET['func'])) {
    switch (htmlspecialchars($_GET['func'])) {
        case 'createsupplier':

            if (isset($_POST['addsupplier'])) {
                $newcomp = $_POST['newcomp'];
                $newcont = $_POST['newcont'];
                $newaddr = $_POST['newaddr'];
                $newmail = $_POST['newmail'];
                $newphone = $_POST['newphone'];
                $newsite = $_POST['newsite'];

                $this->storeSupplier($newcomp, $newcont, $newaddr, $newmail, $newphone, $newsite);
            }
            break;
    }
}
