<?php

class BlogController extends Controller{

	public $postObject;
	public $userObject;
	public $commentsObject;

   public function post($pID){
    $this->postObject = new Post();
		$post = $this->postObject->getPost($pID);
	  $this->set('post', $post);
		$this->set('thisID', $pID);
		$this->userObject = new User();
		$isAdmin = $this->userObject->isAdmin();
		$this->set('isAdmin', $isAdmin);
		$this->commentsObject = new Comments();
		$comments = $this->commentsObject->getComments($pID);
		$this->set('comments', $comments);
   }

	public function index(){
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}

	public function addComment(){
		$postID = $_POST['pID'];
		$userID = $_POST['uID'];
		$commentText = $_POST['commentText'];
		$data = array(
			'commentText' => $commentText,
			'date' => date('Y-m-d h:i:s'),
			'postID' => $postID,
			'userID' => $userID
		);
		$this->commentsObject = new Comments();
		$this->commentsObject->addComment($data);
		header("Location: ". BASE_URL . "blog/post/" . $postID);
	}

	public function deleteComment(){
		$this->commentsObject = new Comments();
		$response = $this->commentsObject->deleteComment($_POST['cID']);
		$this->set('message', $response);
		header("Location: ". BASE_URL . "blog/post/" . $_POST['pID']);
	}
	
}

?>
