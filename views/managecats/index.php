<?php include('views/elements/header.php');?>
<?php $message; ?>
<div class="container">
	<div class="page-header">
   <h1> Category Manager </h1>
  </div>

    <?php if(!empty($message)){?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $message; ?>
            <?php unset($_SESSION['cats_message']); ?>
        </div>
    <?php }?>
  <div class="row">
      <a href="<?php echo BASE_URL;?>manageposts/" class="btn btn-primary">Manage Posts</a>
      <?php
      foreach($cats as $row){
          echo "<hr>";
          echo $row['name'];
          echo "<br>";
          echo'<a href="'.BASE_URL.'managecats/edit/'.$row['categoryID'].'" role="button" class="btn btn-warning" >Edit Category</a> ';
          echo '<br>';

      }
      ?>
      <hr>
      <h4>Create a New Category</h4>
      <form action="<?php echo BASE_URL;?>managecats/add" method="post">
          <label for="name">New Category Name:</label>
          <input name="name" required>
          <button type="submit" class="btn btn-primary">Create Category</button>
      </form>
    </div>
</div>
<?php include('views/elements/footer.php');?>

