<?php if(!class_exists('Rain\Tpl')){exit;}?><div>
    <h3>Transações</h3>
</div>
<form action="/transaction/create" method="post" style="margin-top: 15px">
    <div class="box-body row">
        <div class="form-group input-group mb-3">
            <div class="box-body col-md-3">
                <div class="form-group">
                    <label for="Select">Tipo de transação</label>
                    <select class="form-control" name="transactionType" id="Select">
                        <option selected value="add">adicionar itens</option>
                        <option  value="del">retirar itens</option>
                    </select>
                </div>
            </div>
            <div class="box-body col-md-3">
                <div class="form-group">
                    <label for="Select">Produto</label>
                    <select name="transactionProd" class="form-control" id="Select">
                        <?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?>
                        <option value="<?php echo htmlspecialchars( $value1["id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="productquantity">Quantidade</label>
                <input required type="number" class="form-control"  min="0" aria-label="productquantity" name="productquantity" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="form-group col-md-3">
            <input type="submit" value="submit">
        </div>
    </div>
</form>