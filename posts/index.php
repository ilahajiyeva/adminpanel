<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

$stmt = $conn->prepare("SELECT posts.*, GROUP_CONCAT(tags.name) as tags, 
categories.name as category_name FROM posts 
LEFT JOIN categories ON categories.id=posts.category_id
LEFT JOIN post_tag ON post_tag.post_id=posts.id
LEFT JOIN tags ON tags.id=post_tag.tag_id GROUP BY posts.id
ORDER BY posts.id DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Posts
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<a href="./create.php" class="btn btn-success">Create New Post</a>
                        <table class="table">
							<thead>
								<tr>
                                    <th style="width:10%">ID</th>
									<th style="width:25%;">Category</th>
									<th style="width:25%;">Title</th>
									<th style="width:30%;">Description</th>
									<th style="width:30%;">Image</th>
									<th style="width:30%;">Tags</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($posts as $post) {?>
								<tr>
									<td><?= $post['id']?></td>
									<td><?= $post['category_name']?></td>
									<td><?= $post['title']?></td>
									<td><?= $post['description']?></td>
									<td>
									<?php if (!empty($post['image'])): ?>
										<img src="<?= '/adminpanel' . $post['image'] ?>" 
										 width="40" height="40"/>
									<?php endif; ?>
									</td>
									<td><?= $post['tags']?></td>
									<td class="table-action">
										<a href="./edit.php?id=<?= $post['id']?>"><i class="align-middle fas fa-fw fa-pen"></i></a>
										<a href="./delete.php?id=<?= $post['id']?>"><i class="align-middle fas fa-fw fa-trash"></i></a>
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