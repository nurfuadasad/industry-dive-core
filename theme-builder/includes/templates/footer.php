<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package yotta
 */
    $footer_id = get_themebuilder_Id($post->ID, 'footer');
    do_action('themeim_core_footer', $footer_id);
?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
