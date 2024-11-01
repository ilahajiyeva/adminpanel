<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

if(isset($_GET['id'])) {

    $stmt = $conn->prepare("SELECT * FROM categories WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Edit Category
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<form action="./update.php?id=<?= $category['id']?>" method="post">
					    <div class="mb-3 col-md-8">
							<label class="form-label">Category Name</label>
							<input type="text" class="form-control" value="<?= $category['name']?>"  name="name">
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