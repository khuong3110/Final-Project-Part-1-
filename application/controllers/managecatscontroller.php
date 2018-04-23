<?php

class ManageCatsController extends Controller{
	
	public $categoryObject;

	protected $access = 1;

	public function index(){
        $this->categoryObject = new Category();

        $cats = $this->categoryObject->getAllCategories();
        $this->set('cats', $cats);
        $this->set('message', $_SESSION['cats_message']);
    }
	
	public function add(){

		$this->categoryObject = new Category();
        $name= $_POST['name'];

        $response = $this->categoryObject ->addCategory($name);
        $_SESSION['cats_message'] = $response;

        header("Location: ". BASE_URL . "managecats");
	}
	

	
	public function edit($cID){
        $this->categoryObject  = new Category();
        $cat = $this->categoryObject->getCategory($cID);

        $this->set('cat', $cat);

		
	}
	public function update(){
	    $name = $_POST['name'];
	    $catID = $_POST['id'];
        $this->categoryObject  = new Category();

        $data = array(
            'name'=> $name,
            'categoryID'=>$catID
        );

        $response = $this->categoryObject ->editCategory($data);
        $_SESSION['cats_message'] = $response;

        header("Location: ". BASE_URL . "managecats/");

    }


	
}
