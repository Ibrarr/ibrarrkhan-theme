<?php get_header(); ?>

    <section id="top">
        <style>
            main #top:after {
                background-image: url(<?php echo IBRARR_TEMPLATE_URI . '/assets/images/top-background-desktop.png'; ?>);
            }
        </style>
        <div class="container px-4">
            <div class="row justify-content-md-center">
               <div class="col-md-10">
                   <h1><?php the_field('top_heading') ?></h1>
                   <p><?php the_field('top_intro') ?></p>
                   <a class="heading-button anchor-button" href="#contact">Get in Touch!</a>
               </div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="container px-4">
            <div class="heading">
                <h1><?php the_field('about_heading') ?></h1>
            </div>
            <div class="row justify-content-md-center align-items-md-center">
                <div class="col-md-3 headshot">
                    <img src="<?php the_field('about_profile_picture') ?>">
                </div>
                <div class="col-md-7 text"><?php the_field('about_about_me') ?></div>
            </div>
        </div>
    </section>

    <section id="work">
        <div class="container px-4">
            <div class="heading">
                <h1><?php the_field('work_heading') ?></h1>
            </div>

            <div id="filter-options">
                <p data-value="all" class="active">All</p>
                <p data-value="website">Websites</p>
                <p data-value="web-app">Web Apps</p>
                <p data-value="landing-page">Landing Pages</p>
            </div>

            <div class="col-10 mb-4 work-separator"></div>

            <div id="all-work-container"><!-- Container to display the results --></div>
            <button id="see-more-work" style="display:none;">See More</button>
            <div id="loading-indicator">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </section>

<!--    <section id="services">-->
<!--        <div class="container px-4">-->
<!--            <div class="heading">-->
<!--                <h1>Services.</h1>-->
<!--            </div>-->
<!--            <div class="row justify-content-lg-center">-->
<!--                <div class="col-lg-3 col-md-4 col-sm-6 service">-->
<!--                    <div class="inner">-->
<!--                        <i class="fa-solid fa-code"></i>-->
<!--                        <h4>Web Development</h4>-->
<!--                        <p>We offer custom web development services to build and design professional websites and applications</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-4 col-sm-6 service">-->
<!--                    <div class="inner">-->
<!--                        <i class="fa-solid fa-credit-card"></i>-->
<!--                        <h4>Ecommerce</h4>-->
<!--                        <p>We can help you set up and manage an online store to sell your products or services</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-4 col-sm-6 service">-->
<!--                    <div class="inner">-->
<!--                        <i class="fa-solid fa-database"></i>-->
<!--                        <h4>Hosting</h4>-->
<!--                        <p>We provide fast and reliable hosting solutions to keep your website up and running smoothly</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="row justify-content-lg-center">-->
<!--                <div class="col-lg-3 col-md-4 col-sm-6 service">-->
<!--                    <div class="inner">-->
<!--                        <i class="fa-solid fa-code-compare"></i>-->
<!--                        <h4>Migrations</h4>-->
<!--                        <p>We can assist with migrating your website to a new platform or server.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-4 col-sm-6 service">-->
<!--                    <div class="inner">-->
<!--                        <i class="fa-solid fa-clock-rotate-left"></i>-->
<!--                        <h4>Optimization</h4>-->
<!--                        <p>We offer optimization services to improve the performance and speed of your website</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-3 col-md-4 col-sm-6 service">-->
<!--                    <div class="inner">-->
<!--                        <i class="fa-solid fa-ranking-star"></i>-->
<!--                        <h4>SEO</h4>-->
<!--                        <p>We provide SEO services to help increase the visibility and ranking of your website in search engine results</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->

    <section id="testimonials">
        <div class="container px-4">
            <div class="heading">
                <h1><?php the_field('testimonial_heading') ?></h1>
                <p><?php the_field('testimonial_subheading') ?></p>
            </div>
            <div class="splide" id="testimonials-slider">
                <div class="splide__track">
                    <ul class="splide__list">
	                    <?php
	                    if( have_rows('testimonials') ):
		                    while( have_rows('testimonials') ) : the_row();
			                    $headshotlogo = get_sub_field('headshotlogo');
			                    $quote = get_sub_field('quote');
			                    $name = get_sub_field('name');
			                    $company = get_sub_field('company');
			                    ?>
                                <li class="splide__slide">
                                    <div class="testimonial">
                                        <div class="headshot-container">
                                            <img class="headshot-logo" src="<?php echo $headshotlogo; ?>" alt="Sarah Barlow">
                                        </div>
                                        <div class="text">
                                            <p class="quote-mark">“</p>
                                            <p class="quote-text"><?php echo $quote; ?></p>
                                            <div class="five-star">
							                    <?php echo file_get_contents( IBRARR_TEMPLATE_DIR . '/assets/images/five-star.svg' ); ?>
                                            </div>
                                            <p class="name"><?php echo $name; ?></p>
			                                <?php if ( $company ) { ?>
                                                <p class="company"><?php echo $company; ?></p>
				                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
		                    <?php
		                    endwhile;
	                    endif;
	                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container px-4">
            <div class="row justify-content-lg-center">
                <div class="col-lg-5 col-md-6 text">
                    <div class="heading">
                        <h1><?php the_field('contact_heading') ?></h1>
                        <p><?php the_field('contact_subheading') ?></p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 form">
                    <?php echo do_shortcode( '[gravityform id="' . get_field( 'contact_form' ) . '" title="false" description="false" ajax="true"]' ); ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>