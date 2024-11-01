<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

if(isset($_GET['id'])) {

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Edit User
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<form action="./update.php?id=<?= $user['id']?>" method="post" enctype="multipart/form-data">
					    <div class="mb-3 col-md-8">
							<label class="form-label">Name</label>
							<input type="text" class="form-control" value="<?= $user['name']?>"  name="name">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Email</label>
							<input type="email" class="form-control" value="<?= $user['email']?>"  name="email">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Password</label>
							<input type="password" class="form-control" value="<?= $user['password']?>"  name="password">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Image</label>
							<input type="file" class="form-control" value="<?= $user['image']?>"  name="image">
							<?php if (!empty($user['image'])): ?>
										<img src="<?= '/adminpanel' . $user['image'] ?>" 
										 width="40" height="40"/>
							<?php endif; ?>
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
}
require "../layouts/footer.php";

?>