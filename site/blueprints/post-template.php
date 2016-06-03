<?php if(!defined('KIRBY')) exit ?>

title: Blog Post Template
pages: false
files: true
fields:
  title:
    label: Title
    type: title
  date:
    label: Date
    type: date
    width: 1/2
    default: today
  author:
    label: Author
    type: text
    width: 1/2
  tags:
    label: Tags
    type: tags
  summary:
    label: Summary
    type: text
  text:
    label: Text
    type: textarea
