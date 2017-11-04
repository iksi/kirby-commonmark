<?php

namespace Kirby\Plugins\CommonMark\Component;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

class Markdown extends \Kirby\Component\Markdown {

  public function defaults() {
    return [
      'plugin.commonmark' => true,
      'plugin.commonmark.config' => []
    ];
  }

  public function parse($commonmark) {
    if(!$this->kirby->options['plugin.commonmark']) {
      return $commonmark;
    } else {
      $config = $this->kirby->options['plugin.commonmark.config'];
      $environment = Environment::createCommonMarkEnvironment();
      $converter = new CommonMarkConverter($config, $environment);
      return $converter->convertToHtml($commonmark);
    }
  }

}