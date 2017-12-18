<?php

namespace Kirby\Plugins\CommonMark\Component;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;
use Field;

class Markdown extends \Kirby\Component\Markdown {

  public function defaults() {
    return [
      'plugin.commonmark' => true,
      'plugin.commonmark.config' => [],
      'plugin.commonmark.extensions' => []
    ];
  }

  public function parse($commonmark, Field $field = null) {
    if(!$this->kirby->options['plugin.commonmark']) {
      return $commonmark;
    } else {
      $config = $this->kirby->options['plugin.commonmark.config'];
      $extensions = $this->kirby->options['plugin.commonmark.extensions'];
      $environment = Environment::createCommonMarkEnvironment();

      foreach ($extensions as $extension) {
        $environment->addExtension($extension);
      }

      $converter = new CommonMarkConverter($config, $environment);

      return $converter->convertToHtml($commonmark);
    }
  }

}
