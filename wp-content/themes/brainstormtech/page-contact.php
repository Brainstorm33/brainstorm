<?php
/**
 * The template for displaying all pages
 * Template Name: Contact page
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
//$fields = get_field('behance','options');
//var_dump($fields);
?>

    <main id="primary" class="page-content">
   <div class="container">
      <div class="columns">
         <div class="column">
            <h1 class="page-title">let’s get </br> in touch</h1>
            <div class="network">
               <ul>
                  <li><a target="_blank" href="mailto:hello@brainstormtech.io">hello@brainstormtech.io</a></li>
                  <li><a target="_blank" href="https://www.behance.net/<?php echo get_field('behance','options'); ?>">behance</a></li>
                  <li><a target="_blank" href="https://instagram.com/<?php echo get_field('behance','options'); ?>">instagram</a></li>
                  <li><a target="_blank" href="https://www.facebook.com/<?php echo get_field('behance','options'); ?>">facebook</a></li>
               </ul>
            </div>
         </div>
         <div class="column">
             <?php echo do_shortcode('[contact-form-7 id="53" title="Contact page" html_class="contact-form"]'); ?>
         </div>
      </div>
   </div>
</main>

<?php
get_footer();
