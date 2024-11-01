<?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../db.php";

if(isset($_GET['id'])) {

    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

	$stmt = $conn->prepare("SELECT * FROM categories");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $conn->prepare("SELECT * FROM tags");
    $stmt->execute();
    $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$stmt = $conn->prepare("SELECT * FROM post_tag WHERE post_id = ?");
	$stmt->execute([$_GET['id']]);
	$postTags = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$postTags = array_column($postTags, "tag_id");

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Edit Post
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<form action="./update.php?id=<?= $post['id']?>" method="post" enctype="multipart/form-data">
					    <div class="mb-3 col-md-8">
							<label class="form-label">Title</label>
							<input type="text" class="form-control" value="<?= $post['title']?>"  name="title">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Category</label>
							<select class="form-control" name="category_id">
								<option selected="">Choose Category</option>
									<?php foreach($categories as $category) {?>
										<option 
										<?php if($category['id'] === $post['category_id']) echo "selected"?>
										value="<?= $category['id']?>"><?= $category['name']?></option>
									<?php }?>
							</select>
						</div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Description</label>
							<input type="text" class="form-control" value="<?= $post['description']?>"  name="description">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Image</label>
							<input type="file" class="form-control" value="<?= $post['image']?>"  name="image">
							<?php if (!empty($post['image'])): ?>
										<img src="<?= '/adminpanel' . $post['image'] ?>" 
										 width="40" height="40"/>
							<?php endif; ?>
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label">Tags</label>
							<select class="form-control" name="tags[]" multiple>
								<option>Choose Tags</option>
									<?php foreach($tags as $tag) {?>
										<option 
										<?php if(in_array($tag['id'], $postTags)) echo "selected"?>
										value="<?= $tag['id']?>"><?= $tag['name']?></option>
									<?php }?>
							</select>
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