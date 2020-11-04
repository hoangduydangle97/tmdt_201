<?php
class Ajax extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
    }

    public function action(){
        
    }
}
?>