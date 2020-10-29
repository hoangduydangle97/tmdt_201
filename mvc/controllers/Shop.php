<?php
class Shop extends Controller{
    protected $item_object;
    protected $category_object;
    protected $user_object;
    protected $review_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->user_object = $this->model("User");
        $this->review_object = $this->model("Review");
    }

    public function action($page_no = 0){
        if($page_no != 0){
            $this->item_object->set_page_no($page_no);
        }
        $this->view("Master1", array(
            "page"=>"shop",
            "category"=>"all",
            "item_list"=>$this->item_object->get_all_items_per_page(),
            "category_list"=>$this->category_object->get_all_categories(),
            "latest_item_list"=>$this->item_object->get_latest_items(),
            "num_items"=>$this->item_object->get_num_all_items(),
            "num_pages"=>$this->item_object->get_num_all_pages(),
            "page_no"=>$this->item_object->get_page_no()
        ));
    }

    public function page($page_no){
        $this->action($page_no);
    }

    public function detail($params){
        $username = '';
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
        }
        $this->view("Master1", array(
            "page"=>"detail",
            "item"=>$this->item_object->get_item($params),
            "category_list"=>$this->category_object->get_all_categories(),
            "user"=>$this->user_object->get_info_user($username),
            "review_list"=>$this->review_object->get_all_reviews($params),
            "average_rating"=>$this->item_object->get_average_rated_item($params)
        ));
    }

    public function category($category, $page_no = 0){
        if($page_no != 0){
            $this->item_object->set_page_no($page_no);
        }
        $this->view("Master1", array(
            "page"=>"shop",
            "category"=>$category,
            "name_category"=>$this->item_object->get_name_category($category),
            "item_list"=>$this->item_object->get_items_from_category_per_page($category),
            "category_list"=>$this->category_object->get_all_categories(),
            "latest_item_list"=>$this->item_object->get_latest_items(),
            "num_items"=>$this->item_object->get_num_category_items($category),
            "num_pages"=>$this->item_object->get_num_category_pages($category),
            "page_no"=>$this->item_object->get_page_no()
        ));
    }

    public function review($params){
        $username = isset($_POST['username'])?$_POST['username']:null;
        $item = isset($_POST['item'])?$_POST['item']:null;
        $date = isset($_POST['date'])?$_POST['date']:null;
        $rating = isset($_POST['rating'])?$_POST['rating']:null;
        $comment = isset($_POST['comment'])?$_POST['comment']:null;
        if($comment != null){
            $comment = str_replace("'", "\\'", $comment);
        }
        if($params == 'update'){
            $_SESSION['review'] = true;
            $this->review_object->update_review($username, $item, $date ,$rating, $comment);
        }
        else if($params == 'insert'){
            $_SESSION['review'] = true;
            $this->review_object->insert_review($username, $item, $rating, $comment);
        }
        else if($params == 'delete'){
            $_SESSION['review'] = true;
            $this->review_object->delete_review($username, $item, $date);
        }
    }

    /*public function test(){
        $a = $this->item_object->get_top_rated_items();
        var_dump(json_decode($a));
    }*/
}
?>