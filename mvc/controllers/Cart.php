<?php
class Cart extends Controller{
    protected $item_object;
    protected $category_object;
    protected $user_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->user_object = $this->model("User");
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
            "total"=>$this->item_object->get_total(),
            "category_list"=>$this->category_object->get_all_categories(),
            "item_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }

    public function checkout(){
        $arr_cookie = [];
        $user_info = null;
        if(isset($_COOKIE)){
            foreach($_COOKIE as $key => $val){
                $pos = strpos($key, 'selected-');
                if($pos === 0){
                    $arr_cookie[str_replace('selected-', '', $key)] = $val;
                }
            }
        }
        ksort($arr_cookie);
        if(isset($_SESSION['username'])){
            $user_info = $this->user_object->get_info_user($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"checkout",
            "total"=>$this->item_object->get_total(),
            "category_list"=>$this->category_object->get_all_categories(),
            "item_list"=>$this->item_object->get_item_list($arr_cookie),
            "user_info"=>$user_info
        ));
    }
}
?>