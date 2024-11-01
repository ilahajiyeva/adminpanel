 <?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Create New User
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<form action="./store.php" method="post" enctype="multipart/form-data">
					    <div class="mb-3 col-md-8">
							<label class="form-label"> Full Name</label>
							<input type="text" class="form-control" placeholder="Full Name" name="name">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Email</label>
							<input type="email" class="form-control" placeholder="Email Address" name="email">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Password</label>
							<input type="password" class="form-control"  name="password">
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