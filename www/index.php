<?php

require __DIR__ . '/models/news.php';

$items=newsGetAll();

include __DIR__ . '/views/index.php';