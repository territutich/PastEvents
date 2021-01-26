/* past events as shortcode test */
add_shortcode( 'cc-show-past-events', 'show_past_events' );

function show_past_events() {
	
	// Retrieve all events in 2019
  // from https://theeventscalendar.com/knowledgebase/k/using-tribe_get_events/
	$events = tribe_get_events( [
		'eventDisplay' => 'photo',
		'start_date'   => '2019-01-01 00:01',
		'end_date'     => '2019-12-31 23:59',
		'orderby' =>'meta_value',
		'meta_key' => '_EventStartDate',
		'order' => 'ASC',
		'posts_per_page' => -1,
	    'paged' => $paged,
	] ); ?>
	
	<div class="outer-wrapper">

	<?php	
	foreach ( $events as $post ) {
		setup_postdata( $post ); 
		?>

		<div class="inner-wrapper">

			<div class="row">
				
				<article>

					<div class="featured-image-wrapper">
						<a href="<?php echo $post->guid; ?>" title="<?php echo $post->post_title; ?>" rel="bookmark" class="featured-image-link">
							<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?>
						</a>
					</div>

					<div class="event-details-wrapper">
						<div class="event-date-tag">
							<span class="month">
								<?php echo tribe_get_start_time ( $post->ID, 'M'); ?>
							</span>
							<span class="day-number">
								<?php echo tribe_get_start_time ($post->ID, 'j'); ?>
							</span>
						</div>
						<div class="details">
							<h3 class="event-title">
								<a href="<?php echo $post->guid; ?>" title="<?php echo $post->post_title; ?>" rel="bookmark">
									<?php echo $post->post_title; ?>
								</a>
							</h3>
						</div>
					</div>

				</article>

			</div>

		</div>
	<?php } ?>

	</div>

<?php }
