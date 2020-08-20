<div class="product-page">
    <section class="section-1 mb-5" style="background-image: url('<?= IMG.$project->head_img ?>');"></section>
    <section class="section-2  ">
        <div class="container">
            <div class="text">
                <div class="row d-flex justify-content-center  align-items-center p-4  mr-md-5 ml-md-5">


                    <div class="col-12 col-lg-4  ">
                        <div class="client-text  mb-4 " >
                            <h6 class="text-uppercase font-weight-bold" ><?= $client ?></h6>
                            <h5><?= $project->client ?></h5>
                        </div>
                        <div class="project-text mb-4 ">
                            <h6 class="text-uppercase font-weight-bold" ><?= $projec ?></h6>

                            <h5><?= $project->name ?></h5>
                        </div>
                    </div>
                    <div class=" detalis col-12 col-lg-8 ">

                        <h6 class="text-uppercase font-weight-bold">
                            <?= $detalis ?>
                        </h6>
                        <p>
                            <?= $project->details ?>
                        </p>

                    </div>

                </div>


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
                            <img src="'.UPL.$img->img.'" alt="project_img" class="img-fluid  w-100" title="project" style="max-height :1080px !important;">
                        </div>
                    ';
                    $x++;
                }
            ?>
        </div>
    </section>





</div>