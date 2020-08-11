<div class="product-page">
        <section class="section-1 mb-5" style="background-image: url('<?= IMG.$project->head_img ?>');">
            <div class="row align-items-center justify-content-center h-100 w-100">
                <form action="/dashboard/editimg/head/<?= $project->img_details->id.'/'.$project->id ?>" method="post" enctype="multipart/form-data">
                    <div class="update-image row col-1">
                        <span class="edit bg-hover-info">
                            <i class="fa fa-pen"></i>
                        </span>
                        <input type="file" name="add_img" id="" style="display: none;" accept=".jpg,.jpeg,.png,.gif">
                    </div>
                    <div class="text-<?= (($_SESSION['dir'] == 'rtl')? 'left':'right') ?>">
                        <button class="our-save-btn text-white" name="sub" id="submit" disabled><?= $Save ?></button>
                    </div>
                </form>
            </div>

        </section>

        <section class="section-2">
            <div class="container">
                <div class="text">
                    <form method="post" action="#">
                        <div class="row d-flex justify-content-center  align-items-center p-4  mr-md-5 ml-md-5">
                            <div class="col-12 col-lg-12 row">
                                <div class="client-text col-6 mb-4 " >
                                    <h6 class="text-uppercase font-weight-bold" ><?= $name ?></h6>
                                    <h5 data-name="name" data-type="text"><?= $project_details->name ?></h5>
                                </div>
                                <div class="project-text col-6 mb-4 ">
                                    <h6 class="text-uppercase font-weight-bold" ><?= $type ?></h6>

                                    <h5 data-name="type" data-type="text"><?= $project_details->type ?></h5>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4  ">
                                <div class="client-text  mb-4 " >
                                    <h6 class="text-uppercase font-weight-bold" ><?= $client ?></h6>
                                    <h5 data-name="client" data-type="text"><?= $project->client ?></h5>
                                </div>
                                <div class="project-text mb-4 ">
                                    <h6 class="text-uppercase font-weight-bold" ><?= $projec ?></h6>

                                    <h5 data-name="title" data-type="textarea"><?= $project->name ?></h5>
                                </div>
                            </div>
                            <div class=" detalis col-12 col-lg-8 ">

                                <h6 class="text-uppercase font-weight-bold">
                                    <?= $detalis ?>
                                </h6>
                                <p data-type="textarea" data-name="details"><?= $project->details ?></p>

                            </div>

                        </div>

                        <div class="text-<?= (($_SESSION['dir'] == 'rtl')? 'left':'right') ?>">
                            <button class="our-save-btn" name="sub"><?= $Save ?></button>
                        </div>

                    </form>
                </div>
            </div>

        </section>
        <section class="section-3">
            <div class="container-fluid">
                <?php
                    $count = count($project_imgs);
                    $x = 1;
                    foreach ($project_imgs as $img){
                        echo '
                            <div class="project mb-3">
                                <form action="/dashboard/editimg/img/'.$img->imgId.'/'.$project->id.'" method="post" enctype="multipart/form-data">
                                    <div class="want row align-items-center justify-content-center img-fluid  w-100 m-0" style="background-size: 100% 100%;background-repeat:no-repeat; min-height :'.(($x == $count)? '3598':'1080').'px !important; max-height :'.(($x == $count)? '3598':'1080').'px !important; background: url(\''.UPL.$img->img.'\') 0 0/ 100% 100% no-repeat"  title="project">
                                        <div class="update-image row col-1">
                                                <span class="edit col-6 bg-hover-info">
                                                    <i class="fa fa-pen"></i>
                                                </span>
                                                <input type="file" name="add_img" id="" style="display: none;" accept=".jpg,.jpeg,.png,.gif" onchange="return show('.$x.')">
                                                
                                            <a href="/dashboard/deleteimg/img/'.$img->imgId.'/'.$project->id.'" onclick="if(!confirm(\' Are You Sure You Want To Delete This Image (You Can\\\'t Undo Deleting\')){return false}" class="edit col-6 mx-5 bg-hover-danger">
                                                <span style="position: relative;">
                                                    <i class="fa fa-trash"></i>
                                                </span>
                                            </a>
                                        </div>
                                            <div class="text-'.(($_SESSION['dir'] == 'rtl')? 'left':'right').' col-2" id="save'.$x.'" style="display: none">
                                                <button class="our-save-btn text-white" name="sub" id="submit">'.$Save.'</button>
                                            </div>
                                    </div>
                                </form>
                            </div>
                        ';
                        $x++;
                    }
                ?>

                <form method="post" action="/dashboard/details/<?= $project->id ?>/add_image" enctype="multipart/form-data" id="add_form">
                    <div class="project add-project mb-3">
                        <div class="add-image">
                            <span class="add">
                                <i class="fa fa-plus"></i>
                            </span>
                            <input type="file" name="add_img[]" id="" style="display: none;" multiple>
                        </div>

                        <div class="text-<?= (($_SESSION['dir'] == 'rtl')? 'left':'right') ?>">
                            <button class="our-save-btn text-white" name="sub"><?= $Save ?></button>
                        </div>
                    </div>
                </form>

            </div>
        </section>

</div>