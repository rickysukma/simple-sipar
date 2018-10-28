
		<div id="page">
			<div id="header">
				<a href="#menu"></a>
				<span id="Logo" class="svg">
					<img src=" http://1.bp.blogspot.com/-mDUYtcwmoEs/ToGbIMgxJsI/AAAAAAAAABs/AoV-UeacXQ8/s1600/Copy%2Bof%2Bvisit%2Bkalbar%2B12.jpg" />
				</span>
				<!-- <a class="backBtn" href="javascript:history.back();"></a> -->
			</div>
			<div style="height: auto;" class="subHeader"><i class=""></i>
				<?php foreach ($kotas as $kota) {
					?>
						<a style="color: white" href="<?php echo base_url('pariwisata/kota/').$kota['idcity'];?>"><?php echo $kota['city'];?></a>&nbsp;
					<?php
				} ?>
			</div>
			<!-- <input type="text" class="form-control search-wisata" placeholder="Cari tempat wisata"> -->