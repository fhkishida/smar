<?php if(!class_exists('Rain\Tpl')){exit;}?><div>
    <h3>Cadastro de Produtos</h3>
</div>
<form action="/product/create" method="post" style="margin-top: 15px">
    <div class="box-body">
        <div class="form-group input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nome do Produto</span>
            <input type="text" class="form-control"  aria-label="productname" name="productname" aria-describedby="basic-addon1">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Valor</span>
            <input class="form-control" type="number" value="10" min="0" step="0.01" aria-label="productvalue" name="productvalue" aria-describedby="basic-addon1">
        </div>

        <div class="form-group input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Quantidade</span>
            <input type="number" class="form-control"  min="0" aria-label="productquantity" name="productquantity" aria-describedby="basic-addon1">
        </div>
        <input type="submit" value="submit">
    </div>
</form>