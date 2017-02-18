<nav>
	<ul>
	<?php if ($_SESSION['lib']['is_chief'] == 1) : ?>
		<li>
			<a href="?librarian">
				<img src="asset/img/librarian.png" title="Data Pustakawan"/>
			</a>
		</li>
	<?php endif; ?>
		<li>
			<a href="?book">
				<img src="asset/img/book.png" title="Data Buku" >
			</a>
		</li>
		<li>
			<a href="?category">
				<img src="asset/img/category.png" title="Data Kategori" >
			</a>
		</li>
	</ul>
</nav>