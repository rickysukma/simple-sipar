<div class="subHeader"><i class="i-home i-small"></i>Ocean / List Tempat</div>
<?php foreach ($pariwisatas as $pariwisata) {
    ?>

<div id="content" data-search="<?php echo $pariwisata['title'] ?>">
				
                <div class="mainIconPane" style="float: left; margin: 5px; width: 20%;">
                    <img style="width: 100%;" src="<?php echo base_url('assets/img/pariwisata/');echo $pariwisata['image'] ?>">
                </div>                
                <div class="mainIconPane" style="float: left; width: 70%;">
                    <h4><a href="<?php echo base_url('pariwisata/detail_wisata/').$pariwisata['idmaininfo'] ?>"><?php echo $pariwisata['title'] ?></a></h4>
                    <p>Lokasi : <?php echo $pariwisata['address'] ?><br>
                    </p>
                    <span style="border-left: 15px solid lightblue;">&nbsp;<a style="text-decoration: none;" href="<?php echo base_url().'wilayah/'.$pariwisata['idcity']?>"><?php echo $pariwisata['city']?></a></span>
                </div>
                <div class="mainIconPane" style="width: 7%;">
                    <a href="<?php echo $pariwisata['link'] ?>">
                        <img class="" src="<?php echo base_url('assets/img/navigation.png') ?>">
                    </a>
                </div> 
            

</div>
<hr>

<?php
    }
?>