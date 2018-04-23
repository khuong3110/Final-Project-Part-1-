
<?php include('views/elements/header.php');?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>

</div>

	<?php foreach($posts as $p){?>
    <h3><a href="<?php echo BASE_URL?>blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h3>
        <h6 style="color:#bdbdbd;"><?php $d = new DateTime( $p['date']); echo $d->format("l, F d, Y h:i:s ")?> -- By: <?php echo $p['first_name'];?> <?php echo $p['last_name'];?> -- In: <?php echo $p['name'];?></h6>
	    <div style="margin-top:15px;"><a href="<?php echo BASE_URL?>ajax/get_post_content/?pID=<?php echo $p['pID'];?>" class="btn post-loader">View entire post</a></div>
<?php }?>
</div>




<?php include('views/elements/footer.php');?>
