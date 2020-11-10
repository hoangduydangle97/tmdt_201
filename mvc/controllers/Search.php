<?php
class Search extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        $id = trim($_POST['id_order']);
        header("location: http://localhost/tmdt_201/manageorder/detail/".$id);
    }
}
?>