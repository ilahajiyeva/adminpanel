 <?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Create Page
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<form action="./store.php" method="post" enctype="multipart/form-data">
					    <div class="mb-3 col-md-8">
							<label class="form-label"> Title</label>
							<input type="text" class="form-control" placeholder="Title" name="title">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Description</label>
							<input type="text" class="form-control" placeholder="Description" name="description">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Image</label>
							<input type="file" class="form-control"  name="image">
					    </div>
					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<div class="card-body">
						<div class="my-5">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

<?php

require "../layouts/footer.php";

?>