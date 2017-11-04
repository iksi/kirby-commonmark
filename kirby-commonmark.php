<?php

namespace Kirby\Plugins\CommonMark;

require_once __DIR__ . DS . 'component' . DS . 'markdown.php';

kirby()->set('component', 'markdown', 'Kirby\Plugins\CommonMark\Component\Markdown');
