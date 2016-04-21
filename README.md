# JRA, PHP cAPI interface
JRA is a library to interface the Joomla Rest API (cAPI) of [Annatech LLC](https://www.annatech.com/).


The cAPI is an API for Joomla, which allows you to change the content of articles, modify users and much more.

We use the cAPI in Production and we were thinking: "Why should everyone waste his time, with developing his own interface for the API". So we decided to make an open source library, which contains the functionality to do all of this by the cAPI provided actions.

The JRA is distributed under the GPL-3.0 license.

## Installing JRA
The recommended way to install JRA is through [Composer](https://getcomposer.org/).

Install Composer if not already done:

```bash
curl -sS http://getcomposer.org/installer | php
```


Add ``bertschi/jra`` as project dependency:

```bash
php composer.phar require bertschi/jra
```

Install the dependencies:

```bash
php composer.phar install
```

You need to require Composer's autoloader wherever you want to use the JRA:
```php
require 'vendor/autoload.php';
```