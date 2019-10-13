<nav>
  <ul class="pagination justify-content-center">
<?php
$pagesCount = ceil($tasksCount / 3);
if ($pagesCount <= 10) {
	for ($counter = 1; $counter <= $pagesCount; $counter++){
		if ($counter == $page) :?>
			<li class="page-item active">
				<a class="page-link"><?=$counter?></a>
			</li>
		<?php else :?>
			<li class="page-item">
				<a class="page-link" onclick="changePage(this);"><?=$counter?></a>
			</li>
		<?php endif;
	}
}
?>
  </ul>
</nav>