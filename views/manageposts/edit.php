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
          <a id="message" href="../blog">Blog Post Updated Succesfully. Click here to go back to Blog Posts</a>
        <form id ="form" action="<?php echo BASE_URL?>manageposts/<?php echo $task?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?php echo $title?>">
     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"><?php echo $content?></textarea>
    			<br/>

            <label>Date</label>
            <input type="text" class="span6" name="post_date" value="<?php echo $date?>">
            <label>Category ID</label>
            <select id="categories" name="categoryID">
                <?php
                    foreach ($categories as $cat){
                        echo'<option value="'.$cat["categoryID"].'">'.$cat["name"].'</option>';
                    }
                ?>
            </select>
            <script>
                document.getElementById("categories").selectedIndex= <?php echo $currentCategory["categoryID"] - 1;
                ?>
            </script>
            <input type="hidden" name="pID" value="<?php echo $pID?>"/>
            <br>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>

          <!-- Don't display form on update only for edit and add tasks -->
          <script>
              <?php
                      if ($currentAction == 'update'){
                          echo 'document.getElementById("form").style.display ="none";';
                          echo 'document.getElementById("message").style.display = "block";';
                      }
                      else{
                          echo 'document.getElementById("form").style.display ="block";';
                          echo 'document.getElementById("message").style.display = "none";';
                      }
              ?>
          </script>
        
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

