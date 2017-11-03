<?php

namespace Kirby\Plugin;

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

class KirbyCommonMark extends \Kirby\Component\Markdown {

  public function defaults() {
    return [
      'plugin.commonmark' => true,
      'plugin.commonmark.environment' => Environment::createCommonMarkEnvironment(),
      'plugin.commonmark.breaks' => true,
      'plugin.commonmark.html' => 'allow'
    ];
  }

  public function parse($commonmark) {
    if(!$this->kirby->options['plugin.commonmark']) {
      return $commonmark;
    } else {
      $converter = new CommonMarkConverter([
        'renderer' => [
          'soft_break' => $this->kirby->options['plugin.commonmark.breaks'] ? '<br>' : PHP_EOL
        ],
        'html_input' => $this->kirby->options['plugin.commonmark.html']
      ], $this->kirby->options['plugin.commonmark.environment']);

      return $converter->convertToHtml($commonmark);
    }
  }

}

kirby()->set('component', 'markdown', 'Kirby\Plugin\KirbyCommonMark');
