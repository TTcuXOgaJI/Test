<?php

require_once __DIR__ . '/models/news.php';

$items=News::newsGetAll();

include __DIR__ . '/views/index.php';