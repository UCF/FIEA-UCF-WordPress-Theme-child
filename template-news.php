<?php
/**
 * Template Name: News
 * Template Post Type: page, post
 */
?>


<?php get_header(); the_post(); ?>

<?php include("newsNav.php"); ?>


<article class="<?php echo $post->post_status; ?> post-list-item">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<div class="row">
			<div class="col-10 offset-1">
				
				<!--Hides page titles for this template only-->
				<style>

					@media only screen and (max-width: 992px) {
						.post-template-template-news blockquote {
							float: none !important;
							width: 100% !important;
							font-size: 5px !important;
							
						}
					}

					.post-template-template-news .site-header h1 {
						display: none !important;
					}
					.post-template-template-news blockquote {
						clear: both;
						float: left;
						font-family: "Archer A","Archer B","UCF Slab Serif Alt",serif;
						line-height: 2.5rem;
						font-size: 2rem !important;
						margin-right: 2rem;
						text-align: left;
						width: calc(40% - 30px);
						border-top: 10px solid black;
						border-bottom: 1px solid black;
						padding-top:20px;
					}



				</style>

				<!--Post Categories-->
				<p class="text-muted">
				<?php
					$categories = get_the_category();
					$separator = ' ';
					$output = '';
					if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a role="button" class="btn btn-default  btn-sm" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo trim( $output, $separator );
					}
				?>
				</p>
				
				<!--Post Title-->
				<h1 class="h1">
					<?php the_title(); ?>
				</h1>
				
				<!--Post Date-->
				<p class="text-muted heading-underline mb-5"><?php echo get_the_date(); ?></p>

				<!--Post Content-->
				<?php the_content(); ?>
			

</article>

<!--Boilerplate Info-->
<div class="container bg-faded mb-4">
	<div class="row p-5">
		<div class=" col-2">
			<p class="text-center"><img class="aligncenter img-fluid rounded-circle" src="http://localhost/fiea_02/files/post_boilerplate_gfx.jpg" alt="Shaquem Griffin">
		</div>
		
		<div class=" col-10">
			<h3 class="h6 heading-underline">About FIEA</h3>
			<p class="">FIEA is a graduate video game design program at UCF offering a master’s degree in Interactive Entertainment. Areas of study include game design, development, art, programming and production.</p> 
			<p>For additional information, visit <a href="https://fiea.ucf.edu/">https://fiea.ucf.edu/</a></p>
		</div>
	</div>
</div>
				


<?php get_footer(); ?>


