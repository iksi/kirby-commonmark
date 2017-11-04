<?php

namespace Kirby\Plugins\CommonMark\Component;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

class Markdown extends \Kirby\Component\Markdown {

  public function defaults() {
    return [
      'plugin.commonmark' => true,
      'plugin.commonmark.config' => [],
      'plugin.commonmark.parsers.block' => [],
      'plugin.commonmark.parsers.inline' => []
    ];
  }

  public function parse($commonmark) {
    if(!$this->kirby->options['plugin.commonmark']) {
      return $commonmark;
    } else {
      $config = $this->kirby->options['plugin.commonmark.config'];
      $blockParsers = $this->kirby->options['plugin.commonmark.parsers.block'];
      $inlineParsers = $this->kirby->options['plugin.commonmark.parsers.inline'];
      $environment = Environment::createCommonMarkEnvironment();

      foreach ($blockParsers as $blockParser) {
        $environment->addBlockParser($blockParser);
      }

      foreach ($inlineParsers as $inlineParser) {
        $environment->addInlineParser($inlineParser);
      }

      $converter = new CommonMarkConverter($config, $environment);

      return $converter->convertToHtml($commonmark);
    }
  }

}
