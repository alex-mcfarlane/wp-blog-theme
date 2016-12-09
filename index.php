<?php get_header() ?>

<div class="row">

	<div class="col-sm-9">
		<div class="row">
			<div class="col-lg-12">
				<h1>My Theme</h1>
			</div>
		</div>

		<div class="row">
			<?php 
				if( have_posts() ){
					while( have_posts() ){
						the_post();
						get_template_part('template-parts/content', 'single');
					}
				}
				else{
					get_template_part('template-parts/content', 'none');
				}
			?>
		</div>
	</div>

<?php get_footer() ?>