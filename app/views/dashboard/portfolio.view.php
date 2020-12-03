<div class="portfolio-img">
	<div class="row p-0 m-0  ">
		<?php
			foreach ($projects as $project)
				{
					?>
					<div class="col p-0 entry-box-2 box-1 wow fadeInDown" data-wow-delay="200ms" data-wow-duration=".6s" style="position:relative;">
						<a href="/dashboard/details/<?= $project->id ?>" class="d-block" style="overflow: hidden;height: 100%">
							<img src="/assets/images/<?= $project->img_details->img ?>" alt="" class="img-fluid" style="min-height: 100%;">
							<div class="entry-body d-block">
								<h3><?= $project->name ?></h3>
								<h6><?= $project->name2 ?></h6>
							</div>

						</a>

						<span class="fa<?= ($project->for_home === 'y')? 's':'r' ?> fa-star text-<?= ($project->for_home === 'y')? 'primary':'light' ?> star" data-id="<?= $project->id ?>" style="position:absolute; top: 5%;right: 5%;z-index: 999"></span>
					</div>
		<?php
				}
		?>
	</div>
	<div class="col-12">
		<div class="add-image">
            <span class="add">
                <a href="/dashboard/newProject" class="text-light"><i class="fa fa-plus"></i></a>
            </span>
		</div>
	</div>
</div>