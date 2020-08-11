
<div class="home ">
    <div id="fullpage">

        <?php
        $x = 1;
            foreach ($projects as $project){
                $class = '';//'animated zoomIn delay-2ms wow pulse';
                if($x == 1){
                    $class= 'animated zoomIn delay-2ms';
                }elseif($x == 2){
                    $class = 'wow pulse';
                }
                echo '
                    <section class="vertical-scrolling active '.$class.'" data-wow-duration="2s" data-wow-delay="50ms">
                        <div class="container">
                            <div class=" section section-1  " style="background-image: url(\''.IMG.$project->img.'\');">
                                <div class="text ">
                                    <div class="container">
                                        <div class="row d-flex justify-content-between align-content-between align-items-md-stretch">
                                            <div class=" col-12  col-md-9">
                                                <span>'.$project->type.'</span>
                                                <h1 class="col m-0">'.implode('<br/>',explode(' ',$project->name,2)).'</h1>
                                            </div>
                                            <div class=" project col-12  col-md-3 text-'.(($_SESSION['dir'] == 'ltr')? 'right':'left').'">
                                                <a href="/index/details/'.$project->id.'" class="text-'.(($_SESSION['dir'] == 'ltr')? 'right':'left').' text-white">'.$full.'<i class="fas fa-arrow-'.(($_SESSION['dir'] == 'ltr')? 'right':'left').' fa-lg p'.(($_SESSION['dir'] == 'ltr')? 'l':'r').'-5 text-white "></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                ';
                
                $x++;
            }
        ?>
    </div>
</div>

