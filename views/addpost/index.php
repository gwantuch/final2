<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
    <h1>Add Post</h1>
  </div>
  <?php if(isset($message) && $message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>addpost/<?php if(isset($task)) echo $task; ?>" method="post" id="post-form">
          <label>Title</label>
          <input id="title" type="text" class="span6" name="post_title" value="<?php if(isset($title)) echo $title?>">
          <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s"); ?>"/>
		  <label>Category</label>
          <select id="category" class="span6" name="categoryID"><option selected disabled value>-- Select Category --</option>
			<?php
				$list = new Category();
				$i = 1;
				$categories = $list->getCategories();
				foreach($categories as $category) {
					$selected = '';
					if($category["categoryID"] === $categoryID) { $selected = ' selected'; }
					echo '<option value="'.$category["categoryID"].'"'.$selected.'>'.$category["name"].'</option>';
				}
			?>
		  </select>
     			<label id="content-label">Content</label>
          <textarea id="post-content" name="post_content" style="width:556px;height: 200px"><?php if(isset($content)) echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php if(isset($pID)) { echo $pID; } ?>"/>
		  <input type="hidden" name="uID" value="<?php echo $user->uID; ?>"/>
          <button id="add-submit" class="btn btn-primary" >Submit</button>
        </form>
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

