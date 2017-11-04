# Kirby CommonMark

Replaces Kirby’s markdown component for one that uses [CommonMark](http://commonmark.org/). It uses [league/commonmark](http://commonmark.thephpleague.com/), a Markdown parser for PHP which supports the full [CommonMark spec](http://spec.commonmark.org/).

## Installation

As a git submodule: `git submodule add git@github.com:iksi/kirby-commonmark.git site/plugins/kirby-commonmark`. Or you can put the contents of the repository in `site/plugins/kirby-commonmark`.

After that `cd site/plugins/kirby-commonmark` and `composer install`.

Next the [league/commonmark](http://commonmark.thephpleague.com/) dependency needs to be installed with composer: `composer require league/commonmark:^0.16`. Require the generated `vendor/autoload.php` file from a custom `site.php`:

```PHP
<?php

require_once __DIR__ . DS . 'vendor' . DS . 'autoload.php';

$kirby = kirby();
```

## Configuration

```
c::set('plugin.commonmark', true);
c::set('plugin.commonmark.config', []);
```

Options for `plugin.commonmark.config` are listed on <http://commonmark.thephpleague.com/configuration/>.

## License

[MIT](LICENSE.md)