<?php

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Fkdev\Page;
use \Fkdev\Model\Product;
use \Fkdev\Model\Transaction;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function(){

    $page = new Page();
    $page->setTpl("cadProd");

    // $product = new Product();
    // $teste = $product->listAll() ;
     
});
$app->get('/transaction', function(){

    $products = Product::listAll();

    $page = new Page();
    $page->setTpl("transactions", array(
        "products"=>$products
    ));
     
});
$app->post('/transaction/create', function(){
    


    $product = Product::getById($_POST['transactionProd']);

    if($_POST['transactionType'] === "add"){
        $product[0]['quantity'] = $product[0]['quantity'] + $_POST['productquantity'];
    }else{
        //disponibilidade de itens no db
        if($product[0]['quantity'] > $_POST['productquantity']){
            //retira itens
            $product[0]['quantity'] = $product[0]['quantity'] - $_POST['productquantity'];
        }else{
            //não tem disponivel
        }
    }

    $array_prod = [
        "productid"=>$product[0]['id'],
        "productname"=>$product[0]['name'],
        "productvalue"=>$product[0]['value'],
        "productquantity"=>$product[0]['quantity']
    ];

    $productC = new Product();
    $productC->setData($array_prod);
    $productC->save();

    $transaction = new Transaction();
    $array_trans = [
        "typetransaction"=>$_POST['transactionType'],
        "valuetransaction"=>($product[0]['value'] * $_POST['productquantity']),
        "quantitytransaction"=>$_POST['productquantity'],
        "productid"=>$_POST['transactionProd']
    ];
    $transaction->setData($array_trans);
    $transaction->save();



    header("location: /inventory");
    exit;
});
$app->get('/average', function(){

    $average = Transaction::getAverage();

    // print_r($average);

    $page = new Page();
    $page->setTpl("average", array(
        "average"=>$average
    ));
     
});
$app->get('/inventory', function(){

    $products = Product::listAll();

    $page = new Page();
    $page->setTpl("inventory", array(
        "products"=>$products
    ));
     
});
$app->post('/product/create', function(){
    $product = new Product();
    $product->setData($_POST);
    $product->save();
    header("location: /");
    exit;
});
$app->run();


?>