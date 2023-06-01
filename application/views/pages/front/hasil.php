<main id="main">
    <section
        style="background-image: url(<?php echo base_url(); ?>assets/medbloc/images/img01.png); background-size:cover; height:100px">

    </section>

    <section id="data" class="content-sec container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="heading2 fwbold text-capitalize">Hasil Diagnosa </h2>
                <!-- content holder of the page -->
                <div class="content-block fwLight wow fadeInLeft" data-wow-delay="0.4s"
                    style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                    <div class="box-body">
                        <center>
                            <h1><span class="fa fa-user"></span> <?php echo $this->session->userdata('username'); ?>
                            </h1>
                            <h2><?= date('d') ?> <?= date('F, Y') ?></h2>
                        </center>
                        <blockquote>
                            <?php
              $tabelminat = $this->db->query("SELECT * FROM tabeldiabetes where KodeDiabetes='$_GET[token]'")->result();
              foreach ($tabelminat as $data) {  ?>
                            <h3><b><?php echo $data->NamaDiabetes; ?> </b></h3>
                            <p><?php echo $data->Deskripsi; ?></p>
                            <?php   } ?>




                        </blockquote>
                    </div>


                    <!-- <section id="features" class="feature-sec container">
            <div class="row">
              <div class="col-xs-12">
                <h3 class="heading2 fwbold wow fadeInUp" data-wow-delay="0.2s">Beberapa Jenis Diabetes
                  Lain</h3>
                
                <ul class="list-unstyled tabset wow fadeInUp" data-wow-delay="0.2s">
                  <?php

                  $room_img = $this->db->query("SELECT NamaPenyakit FROM tabelpenyakit where KodePenyakit='$_GET[token]'")->result();
                  foreach ($room_img as $room) {
                  ?>
                    <li>
                      <a href="#tab4-0">
                        
                        <svg class="v2" version="1.1" xmlns="http://www.w3.org/2000/svg" width="1008" height="1024" viewBox="0 0 1008 1024">
                          <title>tes</title>
                          <g id="icomoon-ignore4">
                          </g>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M688.112 512.24c0 106.012-85.94 191.952-191.952 191.952s-191.952-85.94-191.952-191.952c0-106.012 85.94-191.952 191.952-191.952s191.952 85.94 191.952 191.952z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="24" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="miter" d="M508.608 606.032l81.504-81.44c23.328-23.328 23.328-61.104 0-84.352-11.664-11.664-26.896-17.488-42.192-17.488-14.304 0-28.512 5.072-39.808 15.248l-13.584 13.456-11.056-11.136c-11.664-11.584-26.88-17.408-42.192-17.408-15.296 0-30.512 5.824-42.176 17.408-23.264 23.328-23.264 61.12 0 84.384l95.424 95.44">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="24" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="miter" d="M598.768 520.448h23.040"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="24" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="miter" d="M398.192 520.448h44.048l14.208-35.296 25.792 71.648 8.912-26.144 3.488-10.208h16.336l11.088-21.584 16.512 37.136 8.080-15.552h23.968">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="24" stroke-miterlimit="10" stroke-linecap="square" stroke-linejoin="miter" d="M370.496 520.448h27.696"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M495.952 320.288v-80.032"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M495.952 784.064v-80.144"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M329.792 416.224l-69.312-40.016"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M731.456 648.112l-69.408-40.080"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M329.792 608.096l-69.312 40.032"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M731.456 376.192l-69.408 40.080"></path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M608.144 128.256c0 61.856-50.144 112-112 112s-112-50.144-112-112c0-61.856 50.144-112 112-112s112 50.144 112 112z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M527.952 128.064c0 17.673-14.327 32-32 32s-32-14.327-32-32c0-17.673 14.327-32 32-32s32 14.327 32 32z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M432.272 220.24c1.968-33.552 29.84-60.176 63.872-60.176 34.064 0 61.936 26.624 63.904 60.208">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M608.144 896.064c0 61.856-50.144 112-112 112s-112-50.144-112-112c0-61.856 50.144-112 112-112s112 50.144 112 112z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M527.952 895.872c0 17.673-14.327 32-32 32s-32-14.327-32-32c0-17.673 14.327-32 32-32s32 14.327 32 32z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M432.272 988.048c1.968-33.552 29.84-60.176 63.872-60.176 34.064 0 61.936 26.624 63.904 60.208">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M275.664 320.224c0 61.856-50.144 112-112 112s-112-50.144-112-112c0-61.856 50.144-112 112-112s112 50.144 112 112z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M195.488 320.016c0 17.673-14.327 32-32 32s-32-14.327-32-32c0-17.673 14.327-32 32-32s32 14.327 32 32z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M99.792 412.224c1.968-33.568 29.84-60.192 63.872-60.192 34.064 0 61.904 26.624 63.872 60.224">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M940.608 704.128c0 61.847-50.137 111.984-111.984 111.984s-111.984-50.137-111.984-111.984c0-61.847 50.137-111.984 111.984-111.984s111.984 50.137 111.984 111.984z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M860.448 703.936c0 17.682-14.334 32.016-32.016 32.016s-32.016-14.334-32.016-32.016c0-17.682 14.334-32.016 32.016-32.016s32.016 14.334 32.016 32.016z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M764.768 796.128c1.968-33.584 29.808-60.192 63.84-60.192 34.064 0 61.936 26.624 63.904 60.224">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M275.728 704.128c0 61.865-50.151 112.016-112.016 112.016s-112.016-50.151-112.016-112.016c0-61.865 50.151-112.016 112.016-112.016s112.016 50.151 112.016 112.016z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M195.52 703.904c0 17.673-14.327 32-32 32s-32-14.327-32-32c0-17.673 14.327-32 32-32s32 14.327 32 32z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M99.824 796.096c1.968-33.568 29.808-60.192 63.872-60.192s61.904 26.624 63.904 60.224">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M940.672 320.224c0 61.856-50.144 112-112 112s-112-50.144-112-112c0-61.856 50.144-112 112-112s112 50.144 112 112z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M860.48 320.032c0 17.682-14.334 32.016-32.016 32.016s-32.016-14.334-32.016-32.016c0-17.682 14.334-32.016 32.016-32.016s32.016 14.334 32.016 32.016z">
                          </path>
                          <path fill="none" stroke="#2290ff" stroke-width="32" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" d="M764.768 412.208c2-33.536 29.84-60.176 63.872-60.176 34.064 0 61.936 26.624 63.904 60.224">
                          </path>
                        </svg>
                        <h4 class="heading3 text-center text-capitalize fwSemi-bold">
                          <?= $room->NamaPenyakit ?></h4>
                      </a>
                    </li>

                  <?php } ?>
                </ul>

              </div>

            </div>
        </div>
  </section> -->
</main>