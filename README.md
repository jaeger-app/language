# Jaeger Language Object

[![Build Status](https://travis-ci.org/jaeger-app/language.svg?branch=master)](https://travis-ci.org/jaeger-app/language)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jaeger-app/language/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jaeger-app/language/?branch=master)
[![Author](http://img.shields.io/badge/author-@mithra62-blue.svg?style=flat-square)](https://twitter.com/mithra62)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/jaeger-app/bootstrap/master/LICENSE) 

A simple language abstraction to simply keep copy out of your code. This is NOT a translation library.

## Installation

Add `jaeger-app/language` as a requirement to your `composer.json`:

```bash
$ composer require jaeger-app/language
```

## Simple Usage

To get started with `JaegerApp\Language` you pass system paths to directories containing language files which are used for a simple replacement. 

```php
$lang = new Language;
$lang_path = '/path/to/language/files';
$lang->init($lang_path);
```

You can also pass an array of paths to the constructor to bulk load language files

```php
$paths = array(
	'/path/to/language1',
	'/path/to/language2',
	'/path/to/language3'
);
$lang = new Language($paths);
```