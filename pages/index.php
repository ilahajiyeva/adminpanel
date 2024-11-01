<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

$stmt = $conn->prepare("SELECT * FROM pages ORDER BY id DESC");
$stmt->execute();
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Pages
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<a href="./create.php" class="btn btn-success">Create Page</a>
                        <table class="table">
							<thead>
								<tr>
                                    <th style="width:25%">ID</th>
									<th style="width:30%;">Title</th>
									<th style="width:30%;">Description</th>
									<th style="width:30%;">Image</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($pages as $page) {?>
								<tr>
									<td><?= $page['id']?></td>
									<td><?= $page['title']?></td>
									<td><?= $page['description']?></td>
									<td>
									<?php if (!empty($page['image'])): ?>
										<img src="<?= '/adminpanel' . $page['image'] ?>" 
										 width="40" height="40"/>
									<?php endif; ?>
									</td>
									<td class="table-action">
										<a href="./edit.php?id=<?= $page['id']?>"><i class="align-middle fas fa-fw fa-pen"></i></a>
										<a href="./delete.php?id=<?= $page['id']?>"><i class="align-middle fas fa-fw fa-trash"></i></a>
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