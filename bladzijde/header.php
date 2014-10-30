<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bladzijde
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<?php
    /* Provides the Font Styling Cutsomization of Site Title*/

    $title_style = get_theme_mod( 'branding-title' );
    if( $title_style != '' ) {
        switch ( $title_style ) {
            case 'lucida':
                echo '<!-- ONBOARD FONT CHOICE -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family: "Lucida Grande", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-serif':
                echo '<!-- ONBOARD FONT CHOICE -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family: "PT Serif", serif; }';
                echo '</style>';
                break;
            case 'pt-sans':
                echo '<!-- ONBOARD FONT CHOICE -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family: "PT Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-sans-nar':
                echo '<!-- ONBOARD FONT CHOICE -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family: "PT Sans Narrow", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans':
                echo '<!-- ONBOARD FONT CHOICE -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family: "Open Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans-con':
                echo '<!-- ONBOARD FONT CHOICE -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family: "Open Sans Condensed", sans-serif; }';
                echo '</style>';
                break;
        }
    }
    //entry title
    $title_style = get_theme_mod( 'entry-title' );
    if( $title_style != '' ) {
        switch ( $title_style ) {
            case 'lucida':
                echo '<style type="text/css">';
                echo 'nav, .entry-title, h2, h3, h4, h5, h6 { font-family: "Lucida Grande", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-serif':
                echo '<style type="text/css">';
                echo 'nav, .entry-title, h2, h3, h4, h5, h6 { font-family: "PT Serif", serif; }';
                echo '</style>';
                break;
            case 'pt-sans':
                echo '<style type="text/css">';
                echo ' nav, .entry-title, h2, h3, h4, h5, h6 { font-family: "PT Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-sans-nar':
                echo '<style type="text/css">';
                echo 'nav, .entry-title, h2, h3, h4, h5, h6 { font-family: "PT Sans Narrow", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans':
                echo '<style type="text/css">';
                echo 'nav, .entry-title, h2, h3, h4, h5, h6 { font-family: "Open Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans-con':
                echo '<style type="text/css">';
                echo 'nav, .entry-title, h2, h3, h4, h5, h6 { font-family: "Open Sans Condensed", sans-serif; }';
                echo '</style>';
                break;
        }
    }

    /* Provides the Fony Styling Customization of the Tag Line*/
    $tag_style = get_theme_mod( 'branding-tag' );
    if( $tag_style != '' ) {
        switch ( $tag_style ) {
            case 'lucida':
                echo '<style type="text/css">';
                echo '.site-description { font-family: "Lucida Grande", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-serif':
                echo '<style type="text/css">';
                echo '.site-description { font-family: "PT Serif", serif; }';
                echo '</style>';
                break;
            case 'pt-sans':
                echo '<style type="text/css">';
                echo '.site-description { font-family: "PT Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-sans-nar':
                echo '<style type="text/css">';
                echo '.site-description { font-family: "PT Sans Narrow", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans':
                echo '<style type="text/css">';
                echo '.site-description { font-family: "Open Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans-con':
                echo '<style type="text/css">';
                echo '.site-description { font-family: "Open Sans Condensed", sans-serif; }';
                echo '</style>';
                break;
        }
    }
    
    
    /* Provides the Font Styling Cutsomization of Main Content*/

    $font_style = get_theme_mod( 'font-choice' );
    if( $font_style != '' ) {
        switch ( $font_style ) {
            case 'lucida':
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family: "Lucida Grande", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-serif':
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family: "PT Serif", serif; }';
                echo '</style>';
                break;
            case 'pt-sans':
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family: "PT Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'pt-sans-nar':
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family: "PT Sans Narrow", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans':
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family: "Open Sans", sans-serif; }';
                echo '</style>';
                break;
            case 'open-sans-con':
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family: "Open Sans Condensed", sans-serif; }';
                echo '</style>';
                break;

        }
    }
?>

<?php //provides overrides for custom Google Fonts

        //content
        if ( 1 == of_get_option('apply_font_content_checkbox') ) { 
                echo '<!-- CUSTOM FONTS -->';
                echo '<style type="text/css">';
                echo '#content, #colophon, .main-navigation li { font-family:';
                echo of_get_option( 'font_family_content' ); 
                echo '}';
                echo '</style>';
        } else {  

        } // END conditional statement for content fonts

        //site title
        if ( 1 == of_get_option('apply_font_title_checkbox') ) { 
                echo '<!-- CUSTOM TITLE FONT -->';
                echo '<style type="text/css">';
                echo '.site-title { font-family:';
                echo of_get_option( 'font_family_title' ); 
                echo '}';
                echo '</style>';
        } else {  

        } // END conditional statement for site title fonts

        //content titles
        if ( 1 == of_get_option('apply_font_content_title_checkbox') ) { 
                echo '<!-- CUSTOM ENTRY TITLE FONT -->';
                echo '<style type="text/css">';
                echo '.entry-title, h1, h2, h3, h4, h5, h6 { font-family:';
                echo of_get_option( 'font_family_content_title' ); 
                echo ' }';
                echo '</style>';
        } else {  

        } // END conditional statement for content title fonts

        //site tag
        if ( 1 == of_get_option('apply_font_tag_checkbox') ) { 
                echo '<!-- CUSTOM TAGLINE FONT -->';
                echo '<style type="text/css">';
                echo '.site-description { font-family:';
                echo of_get_option( 'font_family_tag' ); 
                echo '}';
                echo '</style>';
        } else {  

        } // END conditional statement for site tag fonts

?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'bladzijde' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
            <?php if ( get_header_image() && ('blank' == get_header_textcolor()) ) : ?>
                <div class="header-image">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
                    </a>
                </div><!--header image-->
            <?php endif; // End header image check. ?>

            <?php 
        if ( get_header_image() && !('blank' == get_header_textcolor()) ) { 
            echo '<div class="site-branding header-background-image" style="background-image: url(' . get_header_image() . ')">'; 
        } else {
            echo '<div class="site-branding">';
        }
            ?> <!-- END conditional statement opening the div for site branding-->


                    <?php if ( 1 == of_get_option('displaybox_checkbox') ) { ?> 
                    
                     <div class="header-wrap extra-padding">
                     <div class="white-background">
                       <div id="header-box" class="box">
                    <?php } else { ?>
                     
                     <div class="header-wrap">
                     <div class="white-background normal-padding">
                        <div id="header-box">
                     <?php } ?><!-- END conditional statement opening the div for box behind text-->

                    <?php 
                            if ( 1 == of_get_option('logo_checkbox') ) { 
                                echo '<div class="logo-image-container clear">'; ?>
                                    <img src="<?php echo of_get_option( "logo_image_uploader" );?>" class="<?php echo of_get_option( 'logo_radio', 'aligncenter' ); ?>" id="logoImage"/>
                    <?php       echo  '</div>'; 
                            } else {
                                
                            }
            ?> <!-- END conditional statement opening the div for logo image-->

                    <?php if ( 1 == of_get_option('displayh1_checkbox') ) { ?> 
                        <h1 class="site-title <?php echo of_get_option( 'alignment_radio', 'text-align-center' ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } else { ?>

                     <?php } ?><!-- END conditional statement for site title-->
            				
                    <?php if ( 1 == of_get_option('displayh2_checkbox') ) { ?> 
                         <h2 class="site-description <?php echo of_get_option( 'alignment_radio', 'text-align-center' ); ?>"><?php bloginfo( 'description' ); ?></h2>
                    <?php } else { ?>
                       
                     <?php } ?><!-- END conditional statement for site title-->
            				
                        </div> <!--box-->
                </div> <!--white-background--> 
                </div> <!--header wrap-->  
            
		</div> <!--.site-branding-->  
          
			<nav id="site-navigation" class="main-navigation" role="navigation">
                <div class="header-wrap">

                    <?php
                    if( is_front_page() ) { ?><!-- Custom Menu Conditional -->

                    <button class="menu-toggle"><?php _e( 'Scroll Menu', 'bladzijde' ); ?></button>
                    <?php wp_nav_menu( array( 'menu' => 'Scroll Menu' ) ); ?>

                    <?php } else { ?>
                    <button class="menu-toggle"><?php _e( 'Primary Menu', 'bladzijde' ); ?></button>
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

                    <?php  }   ?> <!-- END conditional statement about custom menu -->


                    <?php if ( 1 == of_get_option('search_checkbox') ) { ?>  
                        <div class="search-toggle clear">
                            <i class="fa fa-search" alt="search"><a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'bladzijde' ); ?></a></i>
                        </div>
                    <?php } else { ?>
                      
                     <?php } ?>

                </div> <!--header wrap-->
			</nav><!-- #site-navigation -->



            <div id="search-container" class="search-box-wrapper clear">
                <div class="search-box clear">
                    <?php get_search_form(); ?>
                </div>
            </div> <!-- #search-container -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">
