
<div class="home ">
    <div id="fullpage">
        <?php
        foreach ($projects as $project){
            echo '
                    <section class="vertical-scrolling active animated zoomIn delay-2ms   ">
                        <div class="container">
                            <div class=" section section-1  " style="background-image: url(\''.IMG.$project->img.'\');">
                            <div class="update-image">
                                <a href="/dashboard/details/'.$project->id.'"><span class="edit">
                                    <i class="fa fa-pen" aria-hidden="true"></i>
                                </span></a>
                            </div>
                                <div class="text ">
                                    <div class="container">
                                        <div class="row d-flex justify-content-between align-content-between align-items-md-stretch">
                                            <div class=" col-6  col-lg-9">
                                                <span>'.$project->type.'</span>
                                                <h1 class="col-5 m-0">'.$project->name.'</h1>
                                                <h2 class="mt-2m ml-3">'.$project->name2.'</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                ';
        }
        ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?= $create; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/dashbaord/default" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="image"><?= $Image ?></label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name"><?= $Name ?></label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="desc"><?= $Desc ?></label>
                                <textarea type="text" name="desc" id="desc" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $Close ?></button>
                        <button type="button" class="btn btn-primary"><?= $Save ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>