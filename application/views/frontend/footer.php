
			<div class="subFooter" style="position: fixed;bottom: 0">Copyright <?php echo date('Y') ?>. All rights reserved.</div>
			<nav id="menu">
				<ul>
					<li class="Selected">
						<a href="<?php echo base_url(); ?>">
							<i class="i-home i-small"></i>List Wisata
						</a>
					 <?php
					 	if (!empty($pariwisatas)) {
					 		foreach ($pariwisatas as $wisata) {
					  	?>
					  		<li style="">
								<a href="<?php echo base_url('pariwisata/detail_wisata/').$wisata['idmaininfo'] ?>">
									<i class=""></i><?php echo $wisata['title'] ?>
								</a>
							</li>
					 	<?php
					 	}
					  
					  }
					 ?>
					<!-- 	<ul>
							<li><a href="blog-single-post.html">First Post</a></li>
							<li>
								<a href="blog-single-post.html">Second Post</a>
							</li> -->
						</ul>
					</li>
				</ul>
			</nav>
		</div>
		<script type="text/javascript">
    	     $('input.form-control.search-wisata').search(function(){

          		//execute after done typing.

      });
    </script>
		</script>
	</body>
</html>