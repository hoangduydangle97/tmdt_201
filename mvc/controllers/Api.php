<?php
class Api extends Controller{
    protected $item_object;
    protected $category_object;
    protected $user_object;
    protected $review_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->user_object = $this->model("User");
        $this->review_object = $this->model("Review");
        $this->order_object = $this->model("Order");
    }

    public function get(){
        if(isset($_GET['req'])){
            $req = $_GET['req'];
            switch($req){
                case 'all-categories':
                    $sql = "SELECT * FROM category;";
                    $data = json_decode($this->category_object->query_return_arr($sql));
                    $this->handle_data($data);
                    break;

                case 'category':
                    if(isset($_GET['id'])){
                        $sql = "SELECT * FROM category WHERE id_category='".$_GET['id']."';";
                        $data = json_decode($this->category_object->query_return_row($sql));
                        $this->handle_data($data);
                    }
                    else{
                        $this->handle_parameter('id');
                    }
                    break;

                case 'all-items':
                    $sql = "SELECT * FROM item;";
                    $data = json_decode($this->item_object->query_return_arr("SELECT * FROM item;"));
                    $this->handle_data($data);
                    break;

                case 'item':
                    if(isset($_GET['id'])){
                        $sql = "SELECT * FROM item WHERE id_item='".$_GET['id']."';";
                        $data = json_decode($this->item_object->query_return_row($sql));
                        $this->handle_data($data);
                    }
                    else{
                        $this->handle_parameter('id');
                    }             
                    break;

                default:
                    $res = "Invalid value of 'req' parameter";
                    $this->response(400, $res);
            }
        }
        else{
            $this->handle_parameter('req');
        }
    }

    public function handle_data($data){
        if($data){
            $this->response(200, $data);
        }
        elseif($data == null){
            $res = "Not Found";
            $this->response(400, $res);
        }
        else{
            $res = "Internal Server Error";
            $this->response(500, $res);
        }
    }

    public function handle_parameter($param){
        $res = "Expected '".$param."' parameter in the request";
        $this->response(400, $res);
    }

    public function response($status, $res){
        $type = $status == 200 ? 'data':'error';
        $res = array(
            'status' => $status,
            $type => $res
        );
        echo json_encode($res);
    }
}
?>