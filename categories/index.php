<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

$stmt = $conn->prepare("SELECT * FROM categories ORDER BY id DESC");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Categories
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<a href="./create.php" class="btn btn-success">Create Category</a>
                        <table class="table">
							<thead>
								<tr>
                                    <th style="width:25%">ID</th>
									<th style="width:40%;">Name</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($categories as $category) {?>
								<tr>
									<td><?= $category['id']?></td>
									<td><?= $category['name']?></td>
									<td class="table-action">
										<a href="./edit.php?id=<?= $category['id']?>"><i class="align-middle fas fa-fw fa-pen"></i></a>
										<a href="./delete.php?id=<?= $category['id']?>"><i class="align-middle fas fa-fw fa-trash"></i></a>
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
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