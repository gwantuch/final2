<?php include('views/elements/header.php');?>
<div class="hero-unit">
    <h1>Minimalism, Art, and Design</h1>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php
		if((!isset($message) || $message == null) && isset($_SESSION['message'])) {
		  $message = $_SESSION['message'];
		  unset($_SESSION['message']);
		}
		?>
		  <?php if(isset($message) && $message){ ?>
			<div class="alert alert-<?php if(strpos($message, 'Incorrect') !== false || strpos($message, 'not') !== false) { echo 'danger'; } else { echo 'success'; } ?>">
			<button type="button" class="close" data-dismiss="alert">×</button>
				<?php if(isset($message)) echo $message?>
			</div>
		  <?php }?>
		</div>
	</div>
	<div class="row">
		<div class="span8" style="padding-right: 32px;">
			<?php
			foreach ($rss_feed as $article) {
				if($article->title) {
			?>
			  <div>
				<h4><a href="<?php echo $article->guid; ?>"><?php echo $article->title?></a><?php echo ' ('.date('F j, Y, g:i a',strtotime($article->pubDate)).')'; ?></h4>
				<p><?php echo $article->description; ?></p><br>
			  </div>
			<?php
				}
			}
			?>
		</div>
		<div class="span4"> <div style="padding-left: 32px;">
    <?php
      if((!isset($message) || $message == null) && isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
      }
    ?>
    <?php if(isset($message) && $message){ ?>
      <div class="alert alert-<?php if(strpos($message, 'Incorrect') !== false) { echo 'danger'; } else { echo 'success'; } ?>">
      <button type="button" class="close" data-dismiss="alert">×</button>
    <?php if(isset($message)) echo $message; ?>
      </div>
    <?php }?>
  </div>
</div>
<div id="wx" style="padding-left: 32px;">
    <h1>Weather</h1>
  <form method="post" class="zip-submit" <?php /* action="<?php echo BASE_URL; ?>ajax/get_weather/" */ ?>>
    <label for="zip">Enter Your Zip Code</label>
    <input type="text" name="zip" id="zip" required="zip" />
    <br />
    <button type="submit" class="btn">Load Results</button>
  </form>
</div>
<?php /*
<?php if(!isset($result) || !$result) { ?>
<div class="container" id="wx">
  <div class="page-header">
    <h1>Weather</h1>
  </div>
  <form method="post" class="zip-submit" <?php /* action="<?php echo BASE_URL; ?>ajax/get_weather/"  ?>>
    <label for="zip">Enter Your Zip Code</label>
    <input type="text" name="zip" id="zip" required="zip" />
    <br />
    <button type="submit" class="btn">Load Results</button>
  </form>
</div>
<?php } else { ?>
<div class="container">
  <div class="page-header">
  
  <h1>Weather for <?php echo $weather->zip; ?></h1>
  </div>
  <h4>Today's High: <?php echo $weather->forecast->day_max_temp; ?><sup>&deg;</sup> F</h4>
  <h4>Today's Low: <?php echo $weather->forecast->night_min_temp; ?><sup>&deg;</sup> F</h4>
</div>
<?php } ?>
*/ ?></div>
	</div>
</div>
<?php include('views/elements/footer.php');?>
