<?php

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

Router::connect('/admin/posts/:action', array(
    'plugin' => 'Blog',
    'controller' => 'Posts',
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
