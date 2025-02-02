<section class="about mb-4">
        <div class="container">
            <div class="row d-flex justify-content-center  align-items-center  ">

                <div class=" photo col-12  col-md-6 animated  jello delay-2ms ">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                    foreach ($about_imgs as $img)
                                    {
                                        ?>
                                        
                                        <div class="swiper-slide"><img src="<?= UPL.$img->img->img ?>" alt="<?= $img->title ?>"></div>
                                        
                                        <?php
                                    }
                                ?>
                            </div>
                    </div>
                </div>
                <div class=" aboutme col-12 col-md-6 ">
                    <div class="page-title about mb-3  ">
                        <h1 class="typed" style="color:#300595;" data-words="<?= nl2br($about_data['typed']); ?>"></h1>
                    </div>
                    <div class="text pb-4 ">
                        <pre><?= str_replace('\n','<br />',$about_data['data']); ?></pre>
                    </div>


                </div>
            </div>
            </div>

    </section>




    <section class="experience mb-4 ">
        <div class="experience_section pt-5 pb-5 animated fadeInUpBig delay-.2ms ">
            <div class="container">
                <h2 class=" Experience text-center text-primary mb-5"><?= $expr ?></h2>

                <div class="row ">
                    <div class="col-12 d-flex flex-column   align-items-start  col-md-4">
                        <div class="d-flex">
                            <div class="vl"></div>
                            <?php extract($experience); ?>
                            <div>
                                <ul class="list-unstyled text-white">
                                    <?php
                                    for($i=1;$i<=3;$i++){
                                        $time = 'time'.$i;
                                        $expe = 'expe'.$i;
                                        $with = 'with'.$i;
                                        $delay = 100*(9-(9-$i));

                                        echo '
                                        <li class="1 position-relative wow fadeInDownBig" data-wow-delay="'.$delay.'ms" data-wow-duration="1.5s">
                                            <div class="pacman">
                                                <span class="slash"></span>
                                            </div>
                                            <div class=" p-4">
    
                                                <span>'.$$time.'</span>
                                                <h3 class="text-primary">'.$$expe.'</h3>
                                                <h6>'.$$with.'</h6>
    
                                            </div>
                                        </li>';
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-column   align-items-start col-md-4">
                        <div class="d-flex">
                            <div class="vl"></div>

                            <div>
                                <ul class="list-unstyled text-white">
                                    <?php
                                    for($i=4;$i<=6;$i++){
                                        $time = 'time'.$i;
                                        $expe = 'expe'.$i;
                                        $with = 'with'.$i;
                                        $delay = 100*(9-(9-$i));

                                        echo '
                                        <li class="1 position-relative wow fadeInDownBig" data-wow-delay="'.$delay.'ms" data-wow-duration="1.5s">
                                            <div class="pacman">
                                                <span class="slash"></span>
                                            </div>
                                            <div class=" p-4">
    
                                                <span>'.$$time.'</span>
                                                <h3 class="text-primary">'.$$expe.'</h3>
                                                <h6>'.$$with.'</h6>
    
                                            </div>
                                        </li>';
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex flex-column   align-items-start col-md-4">
                        <div class="d-flex">
                            <div class="vl"></div>

                            <div>
                                <ul class="list-unstyled text-white">
                                    <?php
                                        for($i=7;$i<=9;$i++){
                                            $time = 'time'.$i;
                                            $expe = 'expe'.$i;
                                            $with = 'with'.$i;
                                            $delay = 100*(9-(9-$i));

                                            echo '
                                        <li class="1 position-relative wow fadeInDownBig" data-wow-delay="'.$delay.'ms" data-wow-duration="1.5s">
                                            <div class="pacman">
                                                <span class="slash"></span>
                                            </div>
                                            <div class=" p-4">
    
                                                <span>'.$$time.'</span>
                                                <h3 class="text-primary">'.$$expe.'</h3>
                                                <h6>'.$$with.'</h6>
    
                                            </div>
                                        </li>';
                                        }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="clients mb-4 wow fadeInUp "  data-wow-delay="200ms">
        <div class="clients_section pt-5 pb-5 ">
            <div class="container">
                <h2 class=" Experience text-center mb-5"><?= $Clients ?></h2>
                <div class="row  mb-1 wow fadeInUp "  data-wow-delay="250ms ">
                    <?php
                    $x = 1;
                    $count = count($clients);
                    foreach ($clients as $client){
                        echo '
                    <div class=" logo m-1 m-auto p-1 col-6   col-md ">
                        <div class="ground  d-flex align-items-center justify-content-center " style="height: 159px;">
                            <img src="'.IMG.$client->img->img.'" class="img-fluid size" alt="'.$client->title.'" title="mercycorps" style="width: 150px">
                        </div>
                    </div>';

                        if ($x%4 == 0 && $x != $count){
                            echo '</div>
                                <div class="row mb-1 ">';
                        }elseif ($x == $count){
                            echo '</div>';
                        }
                        $x++;
                    }
                    ?>
            </div>
        </div>
    </section>


    <section class="testimonials ">
        <div class="testimonials_section pt-5 pb-5 ">
            <div class="container">
                <h2 class=" Experience text-center text-white mb-5"><?= $Testimonials ?></h2>
                <div class="swiper-container wow  rotateInDownRight " data-wow-delay="300ms">
                    <div class="swiper-wrapper ">
                        <?php
                            foreach ($testimonials as $testimonial){
                                extract(parse_ini_file(INI.$testimonial));
                                echo '
                        <div class="swiper-slide  h-100 p-5">
                            <div class="row d-flex justify-content-around align-items-center ">
                                <div class=" col-6">

                                    <img src="'.UPL.$img.'" alt="Mohammed_img " title="'.$from.'" class="swiper-lazy img-fluid w-100" >

                                    <h6 class="pt-2 d-flex justify-content-end ">'.$from.'</h6>

                                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>

                                </div>
                                <div class=" col-6  ">
                                    <div class="text ">
                                        <p>'.$details.'</p>
                                        <div class="review mt-n1">';
                                for ($i=1;$i<=5;$i++){
                                    if ($i<=intval($stars)){
                                        echo '<span class="fa fa-star checked"></span>';
                                    }else{
                                        echo '<span class="fa fa-star"></span>';
                                    }
                                }
                                        echo '</div>
                                    </div></div>
                            </div>
                        </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination  swiper-pagination-white d-flex justify-content-center">

                </div>


            </div>
        </div>
    </section>





</div>
