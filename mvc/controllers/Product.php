<?php
class Product extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"product",
            "item_list"=>$this->item_object->get_all_items(),
            "order_list"=>$this->order_object->get_undone_order_list()
        ));
    }

    public function categories($option = null, $id_category = null){
        if($option == null){
            $this->view("Master1", array(
                "cms"=>true,
                "page"=>"categories",
                "category_list"=>$this->category_object->get_all_categories(),
                "order_list"=>$this->order_object->get_undone_order_list()
            ));
        }
        else if($option == 'create'){
            $this->category_object->iu_category('insert');
        }
        else if($option == 'update'){
            $this->category_object->iu_category('update');
        }
        else if($option == 'delete'){
            $this->category_object->delete_category($id_category);
        }
    }

    public function create(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"create",
            "category_list"=>$this->category_object->get_all_categories(),
            "order_list"=>$this->order_object->get_undone_order_list()
        ));
    }

    public function update($item){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"update",
            "category_list"=>$this->category_object->get_all_categories(),
            "item"=>$this->item_object->get_item($item),
            "order_list"=>$this->order_object->get_undone_order_list()
        ));
    }

    public function delete($item){
        $item_delete = json_decode($this->item_object->get_item($item));
        $this->item_object->delete_product($item_delete);
    }

    public function insert_product(){
        $this->item_object->iu_product('insert');
    }

    public function update_product(){
        $this->item_object->iu_product('update');
    }
}
?>