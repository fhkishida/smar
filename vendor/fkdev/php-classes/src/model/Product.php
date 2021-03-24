<?php

namespace Fkdev\Model;

Use \Fkdev\DB\Sql;
Use \Fkdev\Model;

class Product extends Model{
    public static function listAll(){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM products");

        return $result;
    }

    public static function getById($id){
        $sql= new Sql();

        $result = $sql->select("SELECT * FROM products WHERE id = :ID", array(":ID"=>$id));

        return $result;
    }

    public function save(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_product_save(:idproduct, :nameproduct, :valueproduct, :quantityproduct)", array(
            ":idproduct"=>$this->getproductid(),
            ":nameproduct"=> $this->getproductname(),
            ":valueproduct"=> $this->getproductvalue(),
            ":quantityproduct"=> $this->getproductquantity()
        ));
        $this->setData($results);
    }
}
?>