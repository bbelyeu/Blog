<?php
$this->set('documentData', array(
    'xmlns:dc' => 'http://purl.org/dc/elements/1.1/'));

$this->set('channelData', array(
    'title' => __("Recent Blog Posts"),
    'link' => $this->Html->url('/', true),
    'description' => __("Recent blog posts"),
    'language' => 'en-us'));

App::uses('Sanitize', 'Utility');

foreach ($posts as $post) {
    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['Post']['body']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 200, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    $postLink = $_SERVER['SERVER_NAME'].'/blog/view/'.$post['Post']['id'];
    echo  $this->Rss->item(array(), array(
        'title' => $post['Post']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        //'dc:creator' => $post['Post']['author'],
        'pubDate' => $post['Post']['publish']
    ));
}
