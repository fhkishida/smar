<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="box box-primary">
    <div class="box-body no-padding">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Produto</th>
            <th>Quantidade/dia</th>
            <th>Valor/dia</th>
            <th>Quantidade/mes</th>
            <th>Valor/mes</th>
          </tr>
        </thead>
        <tbody>
          <?php $counter1=-1;  if( isset($average) && ( is_array($average) || $average instanceof Traversable ) && sizeof($average) ) foreach( $average as $key1 => $value1 ){ $counter1++; ?>
          <tr>
            <td><?php echo htmlspecialchars( $value1["name"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["quantity"] / 365, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["value"] / 365, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["quantity"] / 12, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
            <td><?php echo htmlspecialchars( $value1["value"] / 12, ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>