<?php
/**
 * The template for displaying all pages
 * Template Name: Front page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package brainstormtech
 */

get_header();
?>
    <div id="preloader">
        <div class="top-black"></div>
        <div class="anim-container">
            <div class="full-anim">
                <div class="b-letter"></div>
                <div class="other-letter"></div>
                <div class="dot"></div>
            </div>
        </div>
        <div class="bottom-black"></div>
    </div>

    <div id="hero">

        <div class="mobile-parth">
            <div class="brainstorm-full">
<!--                <img src="/wp-content/themes/brainstormtech/images/hero/Brainstorm_full.svg" alt="">-->
            </div>
            <div class="to-bottom-scroll">
                <p>a full cycle agency <span class="other-font">for all digital & creative.</span></p>
            </div>

            <div class="bottom-details">
                <div class="center">
                    <a href="#">Draw or Scroll to Explore <span class="to-down"></span></a>
                </div>
            </div>
        </div>

        <div class="desktop-parth">
            <div class="pluses"></div>
            <?php if( !empty(get_field('links', 'option')) ) : ?>
                <div class="floating-menu">
                    <div class="mood-bttn">

                    </div>

                    <div class="ellipsis-shape">
                        <a href="<?php echo get_field('links', 'option')[0]['link']['url']; ?>"><?php echo get_field('links', 'option')[0]['link']['title']; ?>
                            <?php if( get_field('links', 'option')[0]['sub_text'] ) : ?>
                                <span class="floating_subtext"><?php echo get_field('links', 'option')[0]['sub_text']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>

                    <div class="radius-shape">
                        <a href="<?php echo get_field('links', 'option')[1]['link']['url']; ?>"><?php echo get_field('links', 'option')[1]['link']['title']; ?>
                            <?php if( get_field('links', 'option')[1]['sub_text'] ) : ?>
                                <span class="floating_subtext"><?php echo get_field('links', 'option')[1]['sub_text']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>

                    <div class="rectangle-shape">
                        <a href="<?php echo get_field('links', 'option')[2]['link']['url']; ?>"><?php echo get_field('links', 'option')[2]['link']['title']; ?>
                            <span class="arrow"></span>
                            <?php if( get_field('links', 'option')[2]['sub_text'] ) : ?>
                                <span class="floating_subtext"><?php echo get_field('links', 'option')[2]['sub_text']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>

                    <div class="square-shape">
                        <a href="<?php echo get_field('links', 'option')[3]['link']['url']; ?>"><?php echo get_field('links', 'option')[3]['link']['title']; ?>
                            <?php if( get_field('links', 'option')[3]['sub_text'] ) : ?>
                                <span class="floating_subtext"><?php echo get_field('links', 'option')[3]['sub_text']; ?></span>
                            <?php endif; ?>
                        </a>
                    </div>

                </div>
            <?php endif; ?>
            <div class="dark-mood">
                <video width="100%" height="100%" autoplay="" muted="" loop="">
                    <source src="/wp-content/themes/brainstormtech/images/hero/Brainstorm bg dark.mp4" type="video/mp4">
                </video>
                <canvas id="demoDark"></canvas>
            </div>
            <div class="light-mood">
                <video width="100%" height="100%" autoplay="" muted="" loop="">
                    <source src="/wp-content/themes/brainstormtech/images/hero/Brainstorm bg light_1.mp4" type="video/mp4">
                </video>
                <canvas id="demoLight"></canvas>
            </div>

            <div class="to-bottom-scroll">
                <p>a full cycle agency <span class="other-font">for all digital & creative.</span></p>
            </div>

          <div class="bottom-details">
              <div class="left"></div>
              <div class="center">
                  <a href="#">Draw or Scroll to Explore <span class="to-down"></span></a>
              </div>
              <div class="right"></div>
          </div>
        </div>

    </div>

<?php
get_footer();
