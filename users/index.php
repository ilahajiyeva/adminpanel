<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

$stmt = $conn->prepare("SELECT * FROM users ORDER BY id DESC");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Users
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<a href="./create.php" class="btn btn-success">Create New User</a>
                        <table class="table">
							<thead>
								<tr>
                                    <th style="width:25%">ID</th>
									<th style="width:30%;">Name</th>
									<th style="width:30%;">Email</th>
									<th style="width:30%;">Password</th>
									<th style="width:30%;">Image</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($users as $user) {?>
								<tr>
									<td><?= $user['id']?></td>
									<td><?= $user['name']?></td>
									<td><?= $user['email']?></td>
									<td><?= $user['password']?></td>
									<td>
									<?php if (!empty($user['image'])): ?>
										<img src="<?= '/adminpanel' . $user['image'] ?>" 
										 width="40" height="40"/>
									<?php endif; ?>
									</td>
									<td class="table-action">
										<a href="./edit.php?id=<?= $user['id']?>"><i class="align-middle fas fa-fw fa-pen"></i></a>
										<a href="./delete.php?id=<?= $user['id']?>"><i class="align-middle fas fa-fw fa-trash"></i></a>
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