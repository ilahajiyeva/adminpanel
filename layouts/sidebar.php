<?php

require $_SERVER['DOCUMENT_ROOT'] . '/adminpanel/db.php';

$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<body>
	<div class="splash active">
		<div class="splash-icon"></div>
	</div>

	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<a class='sidebar-brand' href='index.html'>
				<svg>
					<use xlink:href="#ion-ios-pulse-strong"></use>
				</svg>
				Admin Panel
			</a>
			<div class="sidebar-content">
				<div class="sidebar-user">
				<?php if (!empty($user['image'])): ?>
					<img src="<?= '/adminpanel' . $user['image'] ?>" class="img-fluid rounded-circle mb-2"/>
				<?php endif; ?>
					<div class="fw-bold"><?= $user['name']?></div>
					<small><?= $user['email']?></small>
				</div>

				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?=$baseUrl?>/adminpanel/index.php">
							<i class="align-middle me-2 fas fa-fw fa-home"></i> <span class="align-middle">Dashboards</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="<?=$baseUrl?>/adminpanel/categories/index.php">
                            <i class="align-middle me-2 fas fa-fw fa-braille"></i> <span class="align-middle">Categories</span>
						</a>
					</li>
                    <li class="sidebar-item" >
						<a class="sidebar-link" href="<?=$baseUrl?>/adminpanel/posts/index.php">
                            <i class="align-middle me-2 fa-solid fa-solid fa-signs-post"></i> 
                            <span class="align-middle">Posts</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="<?= $baseUrl?>/adminpanel/tags/index.php">
							<i class="align-middle me-2 fas fa-fw fa-hashtag"></i> <span class="align-middle">Tags</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="<?=$baseUrl?>/adminpanel/pages/index.php">
							<i class="align-middle me-2 fas fa-fw fa-file-lines"></i> <span class="align-middle">Pages</span>
						</a>
					</li>
                    <li class="sidebar-item">
						<a class="sidebar-link" href="<?=$baseUrl?>/adminpanel/users/index.php">
							<i class="align-middle me-2 fas fa-fw fa-users"></i> <span class="align-middle">Users</span>
						</a>
					</li>
				</ul>
			</div>
		</nav>