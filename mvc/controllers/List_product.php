<?php
class ListProduct extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 0){
                header('location: http://localhost/tmdt_201/not-allowed');
            }
            else{
                $this->view("Master1", array(
                    "cms"=>true,
                    "page"=>"product",
                    "item_list"=>$this->item_object->get_all_items(),
                    "num_orders"=>count(json_decode($this->order_object->get_undone_order_list()))
                ));
            }
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
    }

    public function categories($option = null, $id_category = null){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 0){
                header('location: http://localhost/tmdt_201/not-allowed');
            }
            else{
                if($option == null){
                    $this->view("Master1", array(
                        "cms"=>true,
                        "page"=>"categories",
                        "category_list"=>$this->category_object->get_all_categories(),
                        "num_orders"=>count(json_decode($this->order_object->get_undone_order_list()))
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
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
    }

    public function create(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 0){
                header('location: http://localhost/tmdt_201/not-allowed');
            }
            else{
                $this->view("Master1", array(
                    "cms"=>true,
                    "page"=>"create_item",
                    "category_list"=>$this->category_object->get_all_categories(),
                    "num_orders"=>count(json_decode($this->order_object->get_undone_order_list()))
                ));
            }
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
    }

    public function update($item){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 0){
                header('location: http://localhost/tmdt_201/not-allowed');
            }
            else{
                $this->view("Master1", array(
                    "cms"=>true,
                    "page"=>"update_item",
                    "category_list"=>$this->category_object->get_all_categories(),
                    "item"=>$this->item_object->get_item($item),
                    "num_orders"=>count(json_decode($this->order_object->get_undone_order_list()))
                ));
            }
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
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