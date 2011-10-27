<?php
return array(

    'autoLoginDuration' => 3600 * 24 * 7,
    'postCountOfPage' => 15,
    'commentCountOfPage' => 20,
    'numsOfSetPostIsShow' => 10,
    'pecentOfSetPostIsShow' => 2.0,
    'numsOfDeletePost' => 10,
    'pecentOfDeletePost' => 0.5,

    'uploadBasePath' => dirname(__FILE__) . DS . '..' . DS . '..' . DS . 'uploads' . DS,
    'uploadBaseUrl' => 'http://f.onenote.com/',
    'resourceBasePath' => dirname(__FILE__) . DS . '..' . DS . '..' . DS . 'resources' . DS,
    'resourceBaseUrl' => 'http://s.onenote.com/',

    /*
     * datetime format
     */
    'formatDateTime' => 'Y-m-d H:i:s',
    'formatShortDateTime' => 'Y-m-d H:i',
    'formatDate' => 'Y-m-d',
    'formatTime' => 'H:i:s',
    'formatShortTime' => 'H:i',
);