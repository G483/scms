<?php 
	require_once('article.php');
	require_once('category.php');
	//start app
	$params = $_GET;
	var_dump($params);


	$categoryClass = new Category;
	$categories = $categoryClass->all();

	$article = new Article;

	if ($params && isset($params['category_id'])) {

		$articles = $article->byCategory($params['category_id']);
		$view = 'views/list.php';

	}else{
		$articles = $article->all(); 
		$view = 'views/list.php';
	}

	if ($params && isset($params['article_id'])) {
		$article = $article->single($params['article_id']); //ja ovdje prepisujem varijablu koja je na početku prazna instanca klase (a ona od atributa ima onaj $this->db koji vraća kontaš? da
	
		// var_dump($article);die;
		$view = 'views/article.php';
	}
	// var_dump($articles);
?>

<!DOCTYPE html>
<html>
<head>
	<title>SCMS</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="/index.php">SCMS</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <?php foreach ($categories as $obj): ?>
	        	<li <?php echo ( isset($_GET['category_id']) && $_GET['category_id'] == $obj['id'] ) ? 'class="active"' : '' ?> ><a href="/index.php?category_id=<?php echo $obj['id']; ?>"><?php echo $obj['title']; ?> <span class="sr-only">(current)</span></a></li>
	        <?php endforeach ?>
	        
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
</nav>

	<div class="container">
		<?php include($view); ?>
	</div>


</body>
</html>