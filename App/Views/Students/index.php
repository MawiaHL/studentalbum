<?php include '../App/Views/head.php'; ?>
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">About</h4>
          <p class="text-muted">The best thing about a picture is that it never changes, even when the people in it do.</p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Contact</h4>
          <ul class="list-unstyled">
            <li><a href="https://twitter.com/mawia_hl" class="text-white" target="_blank">Follow on Twitter</a></li>
            <li><a href="https://www.facebook.com/HLSOLUTION/" class="text-white" target="_blank">Like on Facebook</a></li>
            <li><a href="mailto:mawiteascc@gmail.com" class="text-white">Email me</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container d-flex justify-content-between">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Students Album</strong>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>
<main role="main">
<div id="result"></div>
<div class="container"> 
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		  <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		  </ol>
		  <div class="carousel-inner">
		    <div class="carousel-item active">
		      <img src="../img/bg3.jpg" height="300" class="d-block w-100" alt="...">
		      <div class="carousel-caption d-none d-md-block">
		          <h5>Why Album</h5>
		          <p>The importance of photos. Photographs play an important role in everyone's life – they connect us to our past, they remind us of people, places, feelings, and stories...</p>
	          </div>
		    </div>
		    <div class="carousel-item">
		      <img src="../img/bg4.jpg" height="300" class="d-block w-100" alt="...">
		       <div class="carousel-caption d-none d-md-block">
		          <h5>Taking Photos</h5>
		          <p>And I am constantly taking pictures on my phone. I'm not saying this is a problem, because it's not, it's awesome that we now have opportunities like this</p>
	          </div>
		    </div>
		    <div class="carousel-item">
		      <img src="../img/bg5.jpg" height="300" class="d-block w-100" alt="...">
		       <div class="carousel-caption d-none d-md-block">
		          <h5>Photography</h5>
		          <p>Photography is used in many ways depending on the specific genre, and its importance varies by use, so this question is ambiguous and I can only give you an ...</p>
	          </div>
		    </div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
	</div>
  	</div>
    <div class="container">      
        <a href="#" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Add New Student</a>
    </div>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row" id="results">
      </div>
    </div>
  </div>
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<div class="modal-header">
			    	<h5 class="modal-title"></h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
		    	</div>
        		<div class="modal-body">
        			<p></p>
        			<ul class="list-group">
					  <li class="sex list-group-item d-flex justify-content-between align-items-center">
					    Sex
					    <span class="badge badge-primary badge-pill"></span>
					  </li>
					  <li class="dob list-group-item d-flex justify-content-between align-items-center">
					    Dob
					    <span class="badge badge-primary badge-pill"></span>
					  </li>
					  <li class="email list-group-item d-flex justify-content-between align-items-center">
					    Email
					    <span class="badge badge-primary badge-pill"></span>
					  </li>
					</ul>
        		</div>
		    </div>
		</div>
	  </div>
</div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="addStudent" method="post" enctype="multipart/form-data">
		  <div class="form-group row">
		    <label for="stname" class="col-sm-4 col-form-label">Name</label>
		    <div class="col-sm-8">
		      <input type="text" name="student" class="form-control" id="stname">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="dob" class="col-sm-4 col-form-label">DOB</label>
		    <div class="col-sm-8">
		      <input type="date" class="form-control" id="dob" name="dob">
		    </div>
		  </div>
		  <fieldset class="form-group">
		    <div class="row">
		      <legend class="col-form-label col-sm-4 pt-0">Sex</legend>
		      <div class="col-sm-8">
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="sex" id="male" value="male" checked>
		          <label class="form-check-label" for="male">
		            Male
		          </label>
		        </div>
		        <div class="form-check">
		          <input class="form-check-input" type="radio" name="sex" id="female" value="female">
		          <label class="form-check-label" for="female">
		            Female
		          </label>
		        </div>
		        <div class="form-check disabled">
		          <input class="form-check-input" type="radio" name="sex" id="other" value="other">
		          <label class="form-check-label" for="other">
		            Other
		          </label>
		        </div>
		      </div>
		    </div>
		  </fieldset>		  
		  <div class="form-group row">
		    <label for="address-text" class="col-sm-4 col-form-label">Address</label>
		    <div class="col-sm-8">
		      <textarea class="form-control" id="address-text" name="address"></textarea>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="email" class="col-sm-4 col-form-label">Email</label>
		    <div class="col-sm-8">
		      <input type="email" class="form-control" id="email" name="email">
		    </div>
		  </div>
		  <div class="form-group row">
		  	<label for="validatedCustomFile" class="col-sm-4 col-form-label">Photo</label>
		  	<div class="col-sm-8">
		  		<input type="file" name="photo" class="form-control" id="validatedCustomFile" required>
		  	</div>			    
		  </div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="submitData" class="btn btn-primary">Save Student</button>
      </div>
    </div>
  </div>
</div>
</main>
<footer class="text-muted">
  <div class="container">
    <p class="float-right">
      <a href="#">Back to top</a>
    </p>
    <p>Students Album Example by Mawia HL, but please download and customize it for yourself!</p>
  </div>
</footer>
<?php include '../App/Views/footer.php'; ?>