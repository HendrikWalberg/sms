<?php

register_sidebar([
	'id' => 'footer_menu_1',
	'name' => 'Footer Menu 1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
    'before_title' => '<p class="widget-title h4">',
	'after_title' => '</p> <div class="divider"></div>',
]);

register_sidebar([
	'id' => 'footer_menu_2',
	'name' => 'Footer Menu 2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
    'before_title' => '<p class="widget-title h4">',
	'after_title' => '</p> <div class="divider background--gray-1"></div>',
]);

register_sidebar([
	'id' => 'footer_menu_3',
	'name' => 'Footer Menu 3',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
    'before_title' => '<p class="widget-title h4">',
	'after_title' => '</p> <div class="divider background--gray-1"></div>',
]);