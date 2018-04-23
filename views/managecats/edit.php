<?php include('views/elements/header.php');?>
<?php $message; ?>
<div class="container">
	<div class="page-header">
   <h1> Edit Post </h1>
  </div>
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message;?>
    </div>
  <?php }?>
    <?php if(isset($_SESSION['message'])){?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $_SESSION['message']?>
            <?php unset($_SESSION['message']); ?>
        </div>
    <?php }?>
  <div class="row">
      <div class="span8">
          <form action="<?php echo BASE_URL;?>managecats/update" method="post">
              <label for="name">New Category Name:</label>
              <input name="name" value="<?php echo $cat['name']?>"required>
              <input name="id" value="<?php echo $cat['categoryID']?>" style="display:none;">
              <button type="submit" class="btn btn-primary">Update Category</button>
          </form>

        
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

