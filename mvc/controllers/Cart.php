<?php
class Cart extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
    }

    public function action(){
        $arr_cookie = [];
        if(isset($_COOKIE)){
            foreach($_COOKIE as $key => $val){
                $pos = strpos($key, 'selected-');
                if($pos === 0){
                    $arr_cookie[str_replace('selected-', '', $key)] = $val;
                }
            }
        }
        ksort($arr_cookie);
        $this->view("Master1", array(
            "page"=>"cart",
            "category_list"=>$this->category_object->get_all_categories(),
            "item_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }
}
?>