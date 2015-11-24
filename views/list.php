<div class="row">		
	<?php foreach ($articles as $obj): ?>
		<div class="col-sm-4">
			<h2><?php echo $obj['title']; ?></h2>
			<p><?php echo $obj['body']; ?></p>
			<a href="/index.php?article_id=<?php echo $obj['id'] ?>" class="btn btn-sm btn-success">Više</a>
		</div>	
	<?php endforeach ?>
</div>