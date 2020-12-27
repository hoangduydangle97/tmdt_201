<?php
$item_list = json_decode($data['item_cart_list']);
$size_list = count($item_list);
?>
<div class="row">
    <div class="col-3">
        <a class="dropdown-item disabled" style="color: black;"><b>Product</b></a>
    </div>
    <div class="col-3">
        <a class="dropdown-item disabled" style="color: black;"><b>Price</b></a>
    </div>
    <div class="col-3">
        <a class="dropdown-item disabled" style="color: black;"><b>Quantity</b></a>
    </div>
    <div class="col-3">
        <a class="dropdown-item disabled" style="color: black;"><b>Total</b></a>
    </div>
</div>
<?php
if($size_list == 0){
?>
<div class="row">
    <div class="col-12">
        <a class="dropdown-item disabled text-center" style="color: black;"><i>There isn't any products in your cart</i></a>
    </div>
</div>
<?php }
else{
    for($row = 0; $row < $size_list; $row++){?>
<div class="row">
    <input type="hidden" class="hidden-input id_item" value="<?php echo $item_list[$row]->id_item; ?>">
    <div class="col-3">
        <a class="dropdown-item" href="http://localhost/tmdt_201/shop/detail/<?php echo $item_list[$row]->id_item;?>">
            <?php echo $item_list[$row]->name_item; ?>
        </a>
    </div>
    <div class="col-3">
        <a class="dropdown-item disabled price-item" id="<?php echo $item_list[$row]->id_item; ?>" style="color: black;">
            <?php echo number_format($item_list[$row]->price_item, 0); ?> <u>đ</u>
        </a>
    </div>
    <div class="col-3">
        <a class="dropdown-item disabled quantity-item" style="color: black;" id="<?php echo $item_list[$row]->id_item; ?>">
            <?php echo $item_list[$row]->quantity; ?>
        </a>
    </div>
    <div class="col-3">
        <a class="dropdown-item disabled total-item" style="color: black;" id="<?php echo $item_list[$row]->id_item; ?>">
        <?php $item_total = $item_list[$row]->price_item * $item_list[$row]->quantity;
            echo number_format($item_total, 0);
        ?>
            <u>đ</u>
        </a>
    </div>
</div>
<?php }}?>
<div class="row">
    <div class="col-12">
        <a class="dropdown-item text-center" href="http://localhost/tmdt_201/cart">
            Go to your cart
        </a>
    </div>
</div>