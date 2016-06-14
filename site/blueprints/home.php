<?php if(!defined('KIRBY')) exit ?>

title: Home
pages: false
fields:
    title:
        label: Title
        type:  text
    text:
        label: Text
        type:  textarea
        size:  large
    featured_article_1_url:
        label: Featured Article 1
        type: text
        required: true
    featured_article_2_url:
        label: Featured Article 2
        type: text
        required: true
