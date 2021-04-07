<?php
/**
 *Template Name: Programs
 */

$context = Timber::context();
$templates = array( 'programs.twig' );



$timber_post     = new Timber\Post();
$context['post'] = $timber_post;
Timber::render( array( 'page-' . $timber_post->post_name . '.twig', 'page.twig' ), $context );
