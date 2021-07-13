
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                
                 <th>Наименование</th>
                  <th>Количество</th>
                   <th>Цена за ед.</th>
                   <th>Сумма</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($session['cart'] as $id => $item):?> 
            <tr>
               
        <td><?= $item['name']?></td>
        <td><?= $item['qty']?></td>
        <td><?= $item['price']?></td>
        <td><?= $item['qty']*$item['price']?></td>
        </tr>
              <?php endforeach; ?>
        
        <tr>
        <hr>
        <td><strong> ИТОГО:</strong></td>
            <td colspan="3"><?= $session['cart.qty'] ?> шт.</td>
        </tr>
        <tr>
            <td><strong> НА СУММУ:</strong></td> 
            <td colspan="3"><?= $session['cart.sum'] ?> руб.</td>
        </tr>
        </tbody>
        <?php echo "Спасибо за заказ на сайте SarMetr" ?>
    </table>
</div>

