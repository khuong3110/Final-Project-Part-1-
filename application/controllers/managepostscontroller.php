<?php

class ManagePostsController extends Controller{

	public $postObject;

  protected $access = "1";

	public function index() {
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('posts', $posts);
  }

    public function add(){
		$this->postObject = new Post();
		$this->categories = new Category();
		$categories =  $this->categories->getAllCategories();
		$this->set('categories', $categories);
		$this->set('task', 'save');
	}

	public function save(){
		$this->set('currentAction','save');
		$this->postObject = new Post();
		$this->categories = new Category();
		$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'], 'date'=>date($_POST['post_date']),'categoryID'=>$_POST['categoryID'], 'uID'=>$_POST['uID']);
		//$this->getCategories();

		$result = $this->postObject->addPost($data);
		$this->set('message', $result);
	}

	public function edit($pID){
		$this->set('currentAction','edit');
		$this->postObject = new Post();
		$this->categories = new Category();
		$post = $this->postObject->getPost($pID);
		$currentCategory = $this->categories->getCategory($post["categoryID"]);
		$categories =  $this->categories->getAllCategories();

		$this->set('pID', $post['pID']);
		$this->set('title', $post['title']);
		$this->set('content', $post['content']);
		$this->set('date', $post['date']);
		$this->set('currentCategory', $currentCategory);
		$this->set('categories', $categories);
		$this->set('task', 'update');
	}

	// public function getCategories(){
	// 	$this->postObject = new Categories();
	// 	$categories = $this->postObject->getCategories();
	// 	$this->set('categories',$categories);
	// }

	public function update(){
		$this->set('currentAction','update');
		$this->postObject = new Post();
		$data = array('title'=>$_POST['post_title'],'content'=>$_POST['post_content'], 'date'=>$_POST['post_date'],'categoryID'=>$_POST['categoryID'], 'pID'=>$_POST['pID']);

		$result = $this->postObject->updatePost($data);
		$outcome = $this->postObject->getAllPosts();
		$this->set('posts',$outcome);
		$this->set('message', $result);
		// $this->getCategories();
		$this->set('task', 'edit',$_POST['pID'] );
	}

	public function deletePost($pID){
		$this->postObject = new Post();
		$response = $this->postObject->deletePost($pID);
		$_SESSION['message'] =$response;
		header("Location: ". BASE_URL . "manageposts");
	}

}
