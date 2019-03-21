<?php include 'head.php';
$url =  "{$_SERVER['REQUEST_URI']}";
$escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
 ?>
<div class="container">
	<div class="alert alert-danger" role="alert">
	    <h1>404 error occurred</h1>
	    <p>Sorry, the page link <strong><?php echo $escaped_url; ?></strong> cannot be found.</p>
	    <button type="button" onclick="document.location='/'" class="btn btn-danger">Go Back</button>
	</div>
</div>
<?php include 'footer.php'; ?>
