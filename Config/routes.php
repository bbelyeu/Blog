<?php

// Add rss extension for blog
Router::parseExtensions('rss');

Router::connect('/admin/blog', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
    'action' => 'index',
    'prefix' => 'admin'
));

Router::connect('/admin/posts', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
    'action' => 'index',
    'prefix' => 'admin'
));

Router::connect('/admin/tags', array(
    'plugin' => 'Blog',
    'controller' => 'Tags',
    'action' => 'index',
    'prefix' => 'admin'
));

Router::connect('/admin/posts/:action', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
    'prefix' => 'admin'
));

Router::connect('/admin/tags/:action', array(
    'plugin' => 'Blog',
    'controller' => 'Tags',
    'prefix' => 'admin'
));

Router::connect('/admin/posts/:action/:id', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
    'prefix' => 'admin'
), array(
    'pass' => array('id'),
    'id' => '[0-9]+'
));

Router::connect('/admin/tags/:action/:id', array(
    'plugin' => 'Blog',
    'controller' => 'Tags',
    'prefix' => 'admin'
), array(
    'pass' => array('id'),
    'id' => '[0-9]+'
));

Router::connect('/blog', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
    'action' => 'index',
));

Router::connect('/blog/post/:id', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
    'action' => 'view',
), array(
    'pass' => array('id'),
    'id' => '[0-9]+',
));
