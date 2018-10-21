<?php
    if(!empty($wisatas)){
        foreach ($wisatas as $wisata) {
    
    ?>

    <div class="subHeader"><i class=""></i><?php echo $wisata->title ?></div>
            <!-- Banner -->
            <div class="bannerPane">
                <section class="slider">
                    <div class="flexslider">
                        <ul class="slides">
                            <?php
                            if (empty($wisata->image)) {
                                    echo "";
                                }else{
                                    echo "<li>
                                        <img src='$wisata->image' />
                                    </li>";
                                }
                                if (empty($wisata->image1)) {
                                    echo "";
                                }else{
                                    echo "<li>
                                        <img src='$wisata->image1' />
                                    </li>";
                                }

                                if (empty($wisata->image2)) {
                                    echo "";
                                }else{
                                    echo "<li>
                                        <img src='$wisata->image2' />
                                    </li>";
                                }

                                if (empty($wisata->image3)) {
                                    echo "";
                                }else{
                                    echo "<li>
                                        <img src='$wisata->image3' />
                                    </li>";
                                }

                                if (empty($wisata->image4)) {
                                    echo "";
                                }else{
                                    echo "<li>
                                        <img src='$wisata->image4' />
                                    </li>";
                                }

                                if (empty($wisata->image5)) {
                                    echo "";
                                }else{
                                    echo "<li>
                                        <img src='$wisata->image5' />
                                    </li>";
                                }
                            
                            ?>
                        </ul>
                    </div>
                </section>
            </div>
            <!-- End Banner -->

            <!-- Content -->
            <div id="content">
                <div class="mainIconPane">
                    <table style="width: 100%;">
                        <tr>
                            <td><strong><?php echo $wisata->title ?></strong></td>
                            <td style="width: 20%">
                                <a href="<?php echo $wisata->link ?>">
                                    <img style="width: 50px;" src="<?php echo base_url('assets/img/navigation.png') ?>">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Alamat</b> : <?php echo $wisata->address ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Wilayah</b> : <?php echo $wisata->city ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><b>Telp</b> : <?php echo $wisata->telp ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"><strong>Tiket Masuk</strong></td>
                        </tr>
                        <tr>
                            <td colspan="2">Weekday : Rp <?php echo $wisata->weekday ?><br>Weekend : Rp <?php echo $wisata->weekend ?></td>
                        </tr>
                    </table>
                </div>
                <div class="mainIconPane">
                    <span class="i-pane i-green">
                        <i class="i-neat"></i>
                    </span>
                    <h4><?php echo $wisata->title ?></h4>
                    <p><?php echo $wisata->desc ?></p>
                </div>
            </div>
<!--            <div class="block">
                INFO 
            </div>-->

            <div class="exploreSiteFullPane">
                <style>
                    body {font-family: Arial;}

                    /* Style the tab */
                    .tab {
                        overflow: hidden;
                        border: 1px solid #ccc;
                        background-color: #f1f1f1;
                        margin-bottom: 45px;
                    }

                    /* Style the buttons inside the tab */
                    .tab button {
                        background-color: inherit;
                        float: left;
                        border: none;
                        outline: none;
                        cursor: pointer;
                        padding: 14px 16px;
                        transition: 0.3s;
                        font-size: 17px;
                    }

                    /* Change background color of buttons on hover */
                    .tab button:hover {
                        background-color: #ddd;
                    }

                    /* Create an active/current tablink class */
                    .tab button.active {
                        background-color: #ccc;
                    }

                    /* Style the tab content */
                    .tabcontent {
                        margin-top: -45px;
                        display: none;
                        padding: 6px 12px;
                        border: 1px solid #ccc;
                        border-top: none;
                        margin-bottom: 55px;
                    }
                </style>
                <script>
                function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(cityName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
                </script>
                <div class="tab">
                                        <button class="tablinks" onclick="openCity(event, '1')">HOTEL</button>
                                        <button class="tablinks" onclick="openCity(event, '2')">INFO KULINER</button>
                                        <button class="tablinks" onclick="openCity(event, '3')">EVENT</button>
                                    </div>
                
                <div id="1" class="tabcontent">
                    <!--<h3>HOTEL</h3>-->
                    <p>                        
                    <table style="width: 100%; border: 0px;">
                        <!-- hotel -->
                      <?php if (!empty($hotels)) {
                          
                        foreach ($hotels as $hotel) {
                             ?>
                            <tr>
                            <td style="width: 35%; padding: 0px; margin: 0px;"><img style="width: 100%;" src="<?php echo $hotel['image'] ?>" /></td>
                            <td style="margin: 0px; padding: 5px;"><b><?php echo $hotel['title'] ?></b><br><?php echo $hotel['telp']?><br>Lokasi : <?php echo $hotel['address'] ?></td>
                            <td style="width: 15%; padding: 0px; margin: 0px;">
                                <a href="<?php echo $hotel['link'] ?>">
                                    <img src="<?php echo base_url('assets/img/navigation.png') ?>">
                                </a>
                            </td>
                        </tr>
                             <?php
                         } 
                     }else{
                        echo "Tidak ada data hotel terdekat disini";
                     }
                      ?>
                        <!--  -->
                    </table>                        
                    </p>
                </div>
                                <div id="2" class="tabcontent">
                    <!--<h3>INFO KULINER</h3>-->
                    <p>                        
                    <table style="width: 100%; border: 0px;">
                        Data tidak di temukan.                    </table>                        
                    </p>
                </div>
                                <div id="3" class="tabcontent">
                    <!--<h3>EVENT</h3>-->
                    <p>                        
                    <table style="width: 100%; border: 0px;">
                        Data tidak di temukan.                    </table>                        
                    </p>
                </div>
                                
            </div>

<?php }}else{
    echo "<center><h1>Data tidak ditemukan</h1><br><a href='".base_url()."'>Home</a></center>";
} ?>    