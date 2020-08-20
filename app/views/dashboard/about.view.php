<section class="about mb-4" xmlns="http://www.w3.org/1999/html">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row d-flex justify-content-center  align-items-center  ">

                    <div class=" photo col-12  col-md-6  animated  jello delay-2ms ">
                        <div class="row mb-4 pt-2 pb-2 p<?= ($_SESSION['dir'] == 'ltr')? 'r':'l' ?>-2">
                            <div class="col-6 col-lg-4">
                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[0]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[0]->img->img ?>" data-width="1536" data-height="2304">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[0]->img->img ?>" alt="<?= $about_imgs[0]->title ?>" title="<?= $about_imgs[0]->title ?>" style="height:216.89px !important;">
                                    </a>
                                </figure>
                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[1]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[1]->img->img ?>" data-width="1279" data-height="853">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[1]->img->img ?>" alt="<?= $about_imgs[1]->title ?>" title="<?= $about_imgs[1]->title ?>" style="height:386.09px !important;">
                                    </a>
                                </figure>

                            </div>
                            <div class="col-6 col-lg-4">

                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[2]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[2]->img->img ?>" data-width="1279" data-height="719">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[2]->img->img ?>" alt="<?= $about_imgs[2]->title ?>" title="<?= $about_imgs[2]->title ?>" style="height:193.84px !important;">
                                    </a>

                                </figure>

                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[3]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[3]->img->img ?>" data-width="1279" data-height="853">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[3]->img->img ?>" alt="<?= $about_imgs[3]->title ?>" title="<?= $about_imgs[3]->title ?>" style="height:193.84px !important;">
                                    </a>

                                </figure>

                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[4]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[4]->img->img ?>"
                                       data-width="1020" data-height="858">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[4]->img->img ?>" alt="<?= $about_imgs[4]->title ?>" title="<?= $about_imgs[4]->title ?>" style="height: 193.84px !important;">
                                    </a>

                                </figure>

                            </div>
                            <div class="col-6 col-lg-4 d-none d-lg-block">

                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[5]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[5]->img->img ?>"
                                       data-width="1279" data-height="870">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[5]->img->img ?>" alt="<?= $about_imgs[5]->title ?>" title="<?= $about_imgs[5]->title ?>" style="height: 298.34px !important;">
                                    </a>

                                </figure>

                                <figure>
                                    <div class="update-image">
                                            <span class="edit">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                        <input type="file" name="image[<?= $about_imgs[6]->id ?>]" id="" style="display: none;">
                                    </div>
                                    <a class="d-block mb-4" data-fancybox="images" href="<?= UPL.$about_imgs[6]->img->img ?>"
                                       data-width="1519" data-height="2279">
                                        <img class="img-fluid w-100" src="<?= UPL.$about_imgs[6]->img->img ?>" alt="<?= $about_imgs[6]->title ?>" title="<?= $about_imgs[6]->title ?>" style="height: 298.34px !important;">
                                    </a>

                                </figure>
                            </div>
                        </div></div>
                    <div class=" aboutme col-12 col-md-6 ">
                        <div class="page-title about mb-3  ">
                            <h1 class="typed"  data-words="<?= $about_data['typed'] ?>"></h1>
                            <div class="form-group">
                                <input type="text" class="form-control" value="<?= $about_data['typed'] ?>" name="typed">
                            </div>
                        </div>
                        <div class="text pb-4 ">
                            <pre><?= str_replace('\n','<br />',$about_data['data']); ?></pre>
                        </div>
                        <div class="text-<?= ($_SESSION['dir'] == 'ltr')? 'right':'left' ?>" style="color:#1C0551!important;">
                            <button class="our-save-btn ml-auto" name="sub"><?= $Save ?></button>
                        </div>

                    </div>
                </div>
                </div>
        </form>

    </section>




    <section class="experience mb-4 ">
        <div class="experience_section pt-5 pb-5 animated fadeInUpBig delay-.2ms ">
            <form action="" method="post">
                <div class="container">
                    <h2 class=" Experience text-center text-primary mb-5"><?= $expr ?></h2>

                    <div class="row ">
                        <div class="col-12 d-flex flex-column   align-items-start  col-md-4">
                            <div class="d-flex">
                                <div class="vl"></div>		
                                <?php extract($experience);?>
                                <div>
                                    <ul class="list-unstyled text-white">
                                        <?php
                                        for($i=1;$i<=3;$i++){
                                            $time = 'time'.$i;
                                            $expe = 'expe'.$i;
                                            $with = 'with'.$i;
                                            $delay = 100*(10-$i)+50;

                                            echo '
                                            <li class="1 position-relative wow fadeInDownBig" data-wow-delay="'.$delay.'ms" data-wow-duration="1.5s">
                                                <div class="pacman">
                                                    <span class="slash"></span>
                                                </div>
                                                <div class=" p-4">
        
                                                    <span data-name="experience['.$i.'][\'time\']" data-type="text">'.$$time.'</span>
                                                    <h3 data-name="experience['.$i.'][\'expe\']" data-type="text" class="text-primary">'.$$expe.'</h3>
                                                    <h6 data-name="experience['.$i.'][\'with\']" data-type="text">'.$$with.'</h6>
        
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

                                <div class=" wow fadeInDownBig">
                                    <ul class="list-unstyled text-white">
                                        <?php
                                        for($i=4;$i<=6;$i++){
                                            $time = 'time'.$i;
                                            $expe = 'expe'.$i;
                                            $with = 'with'.$i;
                                            $delay = 100*(10-$i)+50;

                                            echo '
                                            <li class="1 position-relative wow fadeInDownBig" data-wow-delay="'.$delay.'ms" data-wow-duration="1.5s">
                                                <div class="pacman">
                                                    <span class="slash"></span>
                                                </div>
                                                <div class=" p-4">
        
                                                    <span data-name="experience['.$i.'][\'time\']" data-type="text">'.$$time.'</span>
                                                    <h3 data-name="experience['.$i.'][\'expe\']" data-type="text" class="text-primary">'.$$expe.'</h3>
                                                    <h6 data-name="experience['.$i.'][\'with\']" data-type="text">'.$$with.'</h6>
        
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

                                <div class=" wow fadeInDownBig">
                                    <ul class="list-unstyled text-white">
                                        <?php
                                            for($i=7;$i<=9;$i++){
                                                $time = 'time'.$i;
                                                $expe = 'expe'.$i;
                                                $with = 'with'.$i;
                                                $delay = 100*(10-$i)+50;

                                                echo '
                                            <li class="1 position-relative wow fadeInDownBig" data-wow-delay="'.$delay.'ms" data-wow-duration="1.5s">
                                                <div class="pacman">
                                                    <span class="slash"></span>
                                                </div>
                                                <div class=" p-4">
        
                                                    <span data-name="experience['.$i.'][\'time\']" data-type="text">'.$$time.'</span>
                                                    <h3 data-name="experience['.$i.'][\'expe\']" data-type="text" class="text-primary">'.$$expe.'</h3>
                                                    <h6 data-name="experience['.$i.'][\'with\']" data-type="text">'.$$with.'</h6>
        
                                                </div>
                                            </li>';
                                            }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="our-save-btn ml-auto" name="sub" value="expr"><?= $Save ?></button>
                    </div>
                </div>
            </form>
        </div>
    </section>


    <section class="clients mb-4 wow fadeInUp "  data-wow-delay="200ms">
        <div class="clients_section pt-5 pb-5 ">
            <form action="#" method="post" enctype="multipart/form-data">
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
                            
                                    <div class="update-image">
                                        <span class="edit">
                                            <i class="fa fa-pen text-hover-info"></i>
                                        </span>
                                        <input type="file" name="clients['.$client->id.']" id="" style="display: none;">
                                    </div>
    
                                    <div class="delete-image" onclick="if(confirm(\' Do You Really Want To Delete This Client? This Can Not Be Undone After\')){window.location.href = \'/dashboard/deleteimg/client/'.$client->id.'\'}">
                                        <span class="delete">
                                            <i class="fa fa-trash text-hover-danger"></i>
                                        </span>
                                    </div>
                                    
                                <img src="'.IMG.$client->img->img.'" class="img-fluid size" alt="'.$client->title.'" title="'.$client->title.'" style="width: 150px" >
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

                        <div class="row">
                            <div class="col-11">
                                <div class="add-image">
                                    <span class="add">
                                        <i class="fa fa-plus"></i>
                                    </span>
                                    <input type="file" name="add_img" id="" style="display: none;">
                                </div>
                            </div>
                            <div class="text-right col-1">
                                <button class="our-save-btn mt-2 text-white ml-auto" name="sub" value="clients"><?= $Save ?></button>
                            </div>
                        </div>
                </div>
            </div>
        </form>
    </section>


    <section class="testimonials ">
        <div class="testimonials_section pt-5 pb-5 ">
            <div class="container">

                <h2 class=" Experience text-center text-white mb-5"><?= $Testimonials ?></h2>
                <div class="row">
                    <div class="col-md-11">
                        <form action="#" method="post" enctype="multipart/form-data">
                        <div class="swiper-container wow  rotateInDownRight " data-wow-delay="300ms">
                            <div class="swiper-wrapper ">
                                <?php
                                $x = 1;
                                    foreach ($testimonials as $testimonial){
                                        extract(parse_ini_file(INI.$testimonial));
                                        echo '
                                <div class="swiper-slide  h-100 p-5">
                                    <div class="row d-flex justify-content-around align-items-center ">
                                        <div class=" col-6">
        
                                            <div class="image">
                                                <div class="update-image">
                                                    <span class="edit">
                                                        <i class="fa fa-pen"></i>
                                                    </span>
                                                    <input type="file" name="image['.$x.']" id="" style="display: none;">
                                                </div>
                                                <img src="'.UPL.$img.'" alt="Mohammed_img " title="'.$from.'" class="swiper-lazy img-fluid w-100" >
                                            </div>
        
                                            <h6 class="pt-2 d-flex justify-content-end " data-name="name['.$x.']" data-type="text">'.$from.'</h6>
        
                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
        
                                        </div>
                                        <div class=" col-6  ">
                                            <div class="text ">
                                                <p data-name="opinion['.$x.']" data-type="textarea" >'.$details.'</p>
                                                <div class="review mt-n1">';
                                        for ($i=1;$i<=5;$i++){
                                            if ($i<=intval($stars)){
                                                echo '<span class="fa fa-star star_'.$x.' checked" onclick="return star('.$x.','.$i.')"></span>';
                                            }else{
                                                echo '<span class="fa fa-star star_'.$x.'" onclick="return star('.$x.','.$i.')"></span>';
                                            }
                                        }
                                                echo '<input type="hidden" name="stars['.$x.']" value="'.intval($stars).'">
                                            </div>
                                            </div></div>
                                    </div>
                                    <div class="text-right testo-save">
                                        <button class="our-save-btn ml-auto" name="sub" value="testimonials">'.$Save.'</button>
                                    </div>
                                </div>
                                        ';
                                        $x++;
                                    }
                                ?>
                            </div>
                        </div>
                        </form>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination  swiper-pagination-white d-flex justify-content-center">

                        </div>
                    </div>
                        <div class="col-md-1">
                            <div class="image" style="width: 100%; height:100%">
                                <div class="update-image">
                                            <span class="add" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                    <input type="file" name="image" id="" style="display: none;">
                                </div>
                            </div>
                        </div>
                </div>

            </div>
        </div>
    </section>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Testimonial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image"><?= $Image ?></label>
                                <input type="file" name="image_add" id="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name"><?= $name ?></label>
                                <input type="text" name="name_add" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="opinion"><?= $opinion ?></label>
                                <textarea type="text" name="opinion_add" id="opinion" class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 cpl-6">
                            <div class="form-group text">
                                <label for="star">Star</label>
                                <div class="review mt-n1">
                                    <span class="fa fa-star star_add" onclick="return star('add',1)"></span>
                                    <span class="fa fa-star star_add" onclick="return star('add',2)"></span>
                                    <span class="fa fa-star star_add" onclick="return star('add',3)"></span>
                                    <span class="fa fa-star star_add" onclick="return star('add',4)"></span>
                                    <span class="fa fa-star star_add" onclick="return star('add',5)"></span>
                                    <input type="hidden" name="stars_add" value="" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="sub" value="testimonials_add"><?= $Save ?></button>
                </div>
            </div>
        </form>
    </div>
</div>




</div>
