<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1>Manage Posts</h1>
  </div>

  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>

  <div class="row">
      <div class="span8">

        <a href="<?php echo BASE_URL;?>manageposts/add" class="btn btn-primary">Add Post</a>

				<a href="<?php echo BASE_URL;?>managecategories/" class="btn btn-primary">Manage Categories</a>
	      <?php
	      foreach($posts as $row){
	          $date = new DateTime($row['date']);
	          echo "<hr>";
	          echo $row['title'];
	          echo "<br>";
	          echo'<a href="'.BASE_URL.'manageposts/deletePost/'.$row['pID'].'" role="button" class="btn btn-danger" >Delete Post</a> ';
	          echo'<a href="'.BASE_URL.'manageposts/edit/'.$row['pID'].'" role="button" class="btn btn-warning" >Edit Post</a> ';
	          echo'<a href="'.BASE_URL.'blog/post/'.$row['pID'].'" role="button" target="_blank" class="btn btn-primary" >View Post</a>';
	          echo '<br>';

	      }
	      ?>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>
