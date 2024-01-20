<?php

add_action( 'wp_ajax_nopriv_filter_work', 'filter_work' );
add_action( 'wp_ajax_filter_work', 'filter_work' );
function filter_work() {
	$type_of_work_filter = $_POST['type_of_work'];
	$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
	$limit = 5;

	$post_id = get_option( 'page_on_front' );
	$response_html = '';
	$filtered_count = 0;

	if ( have_rows('work', $post_id) ):
		while ( have_rows('work', $post_id) ) : the_row();
            $mockup = get_sub_field('mockup');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $technologies = get_sub_field('technologies');
            $link_to_demo = get_sub_field('link_to_demo');
            $link_to_github = get_sub_field('link_to_github');
            $type_of_work = get_sub_field('type_of_work');

            $formatted_technologies_string = '';
            if (is_array($technologies)) {
                $formatted_technologies = [];

                foreach ($technologies as $technology) {
                    $formatted_technologies[] = $technology;
                }

                $formatted_technologies_string = implode(' - ', $formatted_technologies);
            }

			if ($type_of_work_filter == 'all' || $type_of_work == $type_of_work_filter) {
				if ($filtered_count >= $offset && $filtered_count < ($offset + $limit)) {
                    ob_start();
                    ?>
                    <div class="row align-items-center mb-4 px-md-5 work-container">
                        <div class="col-md-6 mockup">
                            <img src="<?php echo $mockup; ?>" alt="">
                        </div>
                        <div class="col-md-6 information">
                            <h3><?php echo $heading; ?></h3>
                            <p class="description"><?php echo $description; ?></p>
                            <p class="technologies"><?php echo $formatted_technologies_string; ?></p>
                            <div class="links">
                                <?php if ( $link_to_demo ) { ?>
                                    <a class="button anchor-button" href="<?php echo $link_to_demo; ?>" target="_blank">Live Demo</a>
                                <?php } ?>
                                <?php if ( $link_to_github ) { ?>
                                    <a class="gitgub" href="<?php echo $link_to_github; ?>" target="_blank">
                                        <img src="<?php echo IBRARR_TEMPLATE_URI . '/assets/images/github.png'; ?>" alt="">
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-10 mt-4 work-separator"></div>
                    </div>
                    <?php
                    $response_html .= ob_get_clean();
                }
				$filtered_count++;
            }
		endwhile;
	endif;

	echo json_encode(array(
		'html' => $response_html,
		'total' => $filtered_count,
		'count' => min($limit, $filtered_count - $offset)
	));

	wp_die();
}
