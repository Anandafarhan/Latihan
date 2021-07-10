<?php
class database
{
    var $host = 'localhost';
    var $user = 'root';
    var $pass = 'root';
    var $dbnm = 'latihandb';

    public $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbnm);
    }

    function getdata(){
        $sql = "SELECT productlist.*, productcategory.CategoryName, supplierlist.CompanyName 
        FROM productlist 
        INNER JOIN productcategory ON productlist.CategoryId = productcategory.CategoryId 
        INNER JOIN supplierlist ON productlist.SupplierId = supplierlist.SupplierId;";

        // $data = mysqli_query("SELECT productlist.*, productcategory.CategoryName, supplierlist.CompanyName 
        // FROM productlist 
        // INNER JOIN productcategory ON productlist.CategoryId = productcategory.CategoryId 
        // INNER JOIN supplierlist ON productlist.SupplierId = supplierlist.SupplierId;");

        while($d = mysql_fetch_array($sql)){
			$hasil[] = $d;
		}

        return $hasil;
    }


}
?>