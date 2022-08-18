<?php
/**
 * @package  SsbCodeBlockTheme
 */

namespace Inc\Settings;

class Theme{

    public function register() {
        add_filter( 'posts_where', [ $this, 'worksSQLClause' ] );
        add_filter( 'get_the_archive_title', [ $this, 'archiveTitle' ] );
        add_action('admin_init', [ $this, 'redirectSubsToFrontend'] );
        add_action('wp_loaded', [ $this, 'noSubsAdminBar' ] );
        add_action( 'after_setup_theme', [ $this, 'themeSupport'] );
    }

    public function worksSQLClause($sql) {
        if (is_category()) {
        $sql = str_replace("wp_posts.post_type = 'post'", "wp_posts.post_type = 'works'", $sql); 
        }
        return $sql;
    }


    public function archiveTitle($title) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        } elseif (is_post_type_archive()) {
            $title = post_type_archive_title( '', false );
        }
        return $title;
    }

    // Redirect subscriber accounts out of admin and onto homepage        
    public function redirectSubsToFrontend() {

        $ourCurrentUser = wp_get_current_user();

        if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
        }

    }


    public function noSubsAdminBar() {
        $ourCurrentUser = wp_get_current_user();
        if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
        }
    }

    public function themeSupport() {
        add_theme_support( 'editor-styles' );
        add_editor_style( [ 
        'build/style-index.css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;500;600;800'
        ] );
    }

}
