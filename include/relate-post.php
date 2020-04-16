<div class="relate-post">
	<div class="row">
		<?php
		$post_data2 = $db->select_data("tbl_news", "id,title,img", "status=1", "od DESC", "0,8");
		if ($post_data2 != 0) {
			foreach ($post_data2 as $row2) {
		?>
				<div class="col-6 col-sm-4 col-lg-3 item">
					<a href="<?php echo  BASE_URL . $row[3] . "/" . $row2[0]; ?>">
						<div class="img-box">
							<div class="image" style="background-image: url('<?php echo BASE_URL ?>admin/img/product/<?php echo $row2[2]; ?>');">
							</div>
						</div>
						<div class="title"> <?php echo $out = strlen($row2[1]) > 40 ? substr($row2[1], 0, 250) . "..." : $row2[1]; ?></div>
					</a>
				</div>
		<?php
			}
		}

		?>
	</div>
</div>