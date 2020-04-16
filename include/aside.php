<div class="ads-site">
	<div class="top-view aside">
		<h1>ពេញនិយម</h1>
		<span></span>
		<?php
		$post_data = $db->select_data("tbl_news", "id,title,img,menu_id", "status=1", "view DESC", "0,4");
		if ($post_data != 0) {
			foreach ($post_data as $row) {
			$cate=$db->select_cur_data("tbl_menu", "id,name_link", "id=$row[3]");
		?>
				<a href="<?php echo BASE_URL .$cate[1]; ?>/<?php echo $row[0]; ?>">
					<div class="iteme-aside">
						<div class="aside-img" style="background: url('<?php echo BASE_URL ?>admin/img/product/<?php echo $row[2]; ?>')">
						</div>
						<p><?php echo $out = strlen($row[1]) > 50 ? substr($row[1],0,250)."..." : $row[1]; ?></p>
					</div>
				</a>
		<?php
			}
		}

		?>

	</div>
	<div class="top-view aside" style="margin-top: 15px;">
		<h1>ថ្មីបំផុត</h1>
		<span></span>
		<?php
		$post_data = $db->select_data("tbl_news", "id,title,img,menu_id", "status=1", "id DESC", "0,4");
		if ($post_data != 0) {
			foreach ($post_data as $row) {
			$cate=$db->select_cur_data("tbl_menu", "id,name_link", "id=$row[3]");
		?>
				<a href="<?php echo BASE_URL .$cate[1]; ?>/<?php echo $row[0]; ?>">
					<div class="iteme-aside">
						<div class="aside-img" style="background: url('<?php echo BASE_URL ?>admin/img/product/<?php echo $row[2]; ?>')">
						</div>
						<p><?php echo $out = strlen($row[1]) > 50 ? substr($row[1],0,250)."..." : $row[1]; ?></p>
					</div>
				</a>
		<?php
			}
		}

		?>
	</div>
</div>