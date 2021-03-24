<?php

namespace Fkdev\Model;

Use \Fkdev\DB\Sql;
Use \Fkdev\Model;
Use \Fkdev\Model\Product;

class Transaction extends Model{
    public static function listAll(){

        $sql = new Sql();

        $result = $sql->select("SELECT * FROM transactions");

        return $result;
    }
    public static function getByType($type){
        $sql= new Sql();

        $result = $sql->select("SELECT * FROM transactions WHERE transaction_type = :TTYPE", array(":TTYPE"=>$type));

        return $result;
    }

    public static function getAverage(){
        $sql= new Sql();
        $ids = $sql->select("SELECT DISTINCT(product_id) FROM transactions");

        $arrayToPush = [];

        foreach($ids as $key => $value){

            $prod_name = Product::getById($value['product_id']);

            $result = $sql->select("SELECT * FROM transactions WHERE transaction_type = 'del' AND created_at between '2021/01/01' AND '2021/12/31' AND product_id = :PROD", array(":PROD"=>$value['product_id']));

            $qtt = 0;
            $allVal = 0;

            foreach($result as $key => $row){
                $qtt = $qtt + $row['transaction_qtt'];
                $allVal = $allVal + $row['transaction_value'];
            }

            $response = array("name"=>$prod_name[0]['name'], "quantity"=>$qtt, "value"=>$allVal);
            array_push($arrayToPush, $response);
        }
        // print_r($arrayToPush);
        return $arrayToPush;
    }

    public function save(){
        /*
            id
            transaction_type
            transaction_value
            transaction_qtt
            product_id
            created_at

            ptypetransaction VARCHAR(45),
            pvaluetransaction float,
            pquantitytransaction int,
            pproductid int,
            pdate int
        */
        $sql = new Sql();

        $results = $sql->select("CALL sp_transaction_save(:typetransaction, :valuetransaction, :quantitytransaction, :productid, :pdate)", array(
            ":typetransaction"=>$this->gettypetransaction(),
            ":valuetransaction"=> $this->getvaluetransaction(),
            ":quantitytransaction"=> $this->getquantitytransaction(),
            ":productid"=> $this->getproductid(),
            ":pdate"=> date("Y/m/d"),
        ));
        $this->setData($results);
    }
}
?>