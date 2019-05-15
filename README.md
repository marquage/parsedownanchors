# ParsedownAnchors

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

This tiny extension is part of the larger markdown-driven note-taking site. Although it is primarily aimed for building table of contents, this package accomplishes two things only:

* It automatically generates id-anchors for headers (h1-h6), using Cocur/Slugify. It does not require writing down header slugs ahead of time.
* It ensures that each id is unique. From the simple included test:

```
## The Site  
## The Site
```
will turn to:

```
<h2 id="the-site">The Site</h2>
<h2 id="the-site-1">The Site</h2>
```

For the larger project that relies on the excellent [Tocbot](https://tscanlin.github.io/tocbot/), that's all that was needed but I could not find an extension that addressed these simple concerns. There are other packages for Parsedown TOC, such as [these](https://github.com/BenjaminHoegh/parsedown-toc) [two](https://github.com/KEINOS/parsedown-extension_table-of-contents).

## Install

Via Composer

``` bash
$ composer require marquage/parsedownanchors
```

## Usage

In the unlikely case that you would only need this tiny package, you can call it instead of Parsedown since it is an extension and you would have access to all the rich features of Parsedown-extra.

``` php
$parser = new ParsedownSlugified();
$file = file_get_contents('[...]');
return $parser->parse($file);
```

## Testing

``` bash
$ composer test
```

## Credits

- [Casey McLaughlin][link-toc]
- [Emanuil Rusev][link-parsedown]


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/marquage/parsedownanchors.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/marquage/parsedownanchors/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/marquage/parsedownanchors.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/marquage/parsedownanchors.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/marquage/parsedownanchors.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/marquage/parsedownanchors
[link-travis]: https://travis-ci.org/marquage/parsedownanchors
[link-scrutinizer]: https://scrutinizer-ci.com/g/marquage/parsedownanchors/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/marquage/parsedownanchors
[link-downloads]: https://packagist.org/packages/marquage/parsedownanchors
[link-author]: https://github.com/marquage
[link-toc]: https://github.com/caseyamcl/toc
[link-parsedown]: https://github.com/erusev/parsedown-extra