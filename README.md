<img src="https://useiconic.com/open-iconic/svg/code.svg" height="70">

# Code Field
> This component is a part of the [**Olympus Zeus Core**][zeus-url] **WordPress** framework.  
> It uses the default WordPress code field made with a complete integration with codemirror JS component.

[![Olympus Component][olympus-image]][olympus-url]
[![CodeFactor Grade][codefactor-image]][codefactor-url]
[![Packagist Version][packagist-image]][packagist-url]

## Installation

Using `composer` in your PHP project:

```sh
composer install getolympus/olympus-code-field
```

## Field initialization

Use the following lines to add a `code field` in your **WordPress** admin pages or custom post type meta fields:

```php
return \GetOlympus\Field\Code::build('my_code_field_id', [
    'title'       => 'How do Penguins code their icebergs?',
    'default'     => 'With a frozen bug.',
    'description' => 'A simple question to let you know how to seduce a penguin.',
    'mode'        => 'json',
    'rows'        => 4,

    /**
     * Code mirror settings
     * @see https://developer.wordpress.org/reference/functions/wp_get_code_editor_settings/
     */
    'settings' => [
        'indentUnit'     => 2,
        'indentWithTabs' => false,
        'tabSize'        => 2,
    ],
]);
```

## Variables definitions

| Variable      | Type    | Default value if not set | Accepted values |
| ------------- | ------- | ------------------------ | --------------- |
| `title`       | String  | `'Code'` | *empty* |
| `default`     | String  | *empty* | *empty* |
| `description` | String  | *empty* | *empty* |
| `mode`        | String  | `text/html` | see [Accepted mode](#accepted-mode) |
| `rows`        | Integer | `4` | `> 1` |
| `settings`    | Array   | see [Field initialization](#field-initialization) | see [WordPress reference](https://developer.wordpress.org/reference/functions/wp_get_code_editor_settings/) |

## Accepted mode

* `text/css` or `css`
* `text/x-diff` or `x-diff` or `diff`
* `text/html` or `html`
* `text/javascript` or `javascript` or `js`
* `application/json` or `json`
* `text/x-markdown` or `markdown` or `md`
* `application/x-httpd-php` or `x-httpd-php` or `php`
* `text/x-python` or `x-python` or `python`
* `text/x-ruby` or `x-ruby` or `ruby`
* `text/x-sh` or `x-sh` or `sh`
* `text/x-mysql` or `x-mysql` or `mysql`
* `text/x-mariadb` or `x-mariadb` or `mariadb`
* `application/xml` or `xml`
* `text/x-yaml` or `x-yaml` or `yaml`

## Usage example

Fill the form properly (with JSON in this example):

```json
{
    "response": "With a frozen bug."
}
```

## Retrive data

Retrieve your value from Database with a simple `get_option('my_code_field_id', '')` (see [WordPress reference][getoption-url]):

```php
// Get code from Database
$code = get_option('my_code_field_id', '');

// Display code in HTML tag
echo '<pre>'.htmlspecialchars($code).'</pre>';
```

## Release History

* 0.0.10
- [x] FIX: remove twig dependency from composer

* 0.0.9
- [x] FIX: remove zeus-core dependency from composer

* 0.0.8
- [x] FIX: component is now CodeFactor compliant
- [x] ADD: new version compatible with Zeus-Core latest version

## Authors and Copyright

Achraf Chouk  
[![@crewstyle][twitter-image]][twitter-url]

Please, read [LICENSE][license-blob] for more information.  
[![MIT][license-image]][license-url]

[https://github.com/crewstyle](https://github.com/crewstyle)  
[http://fr.linkedin.com/in/achrafchouk](https://fr.linkedin.com/in/achrafchouk)

## Contributing

1. Fork it (<https://github.com/GetOlympus/olympus-code-field/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

---

**Built with ♥ by [Achraf Chouk](http://github.com/crewstyle "Achraf Chouk") ~ (c) since a long time.**

<!-- links & imgs dfn's -->
[olympus-image]: https://img.shields.io/badge/for-Olympus-44cc11.svg?style=flat-square
[olympus-url]: https://github.com/GetOlympus
[zeus-url]: https://github.com/GetOlympus/Zeus-Core
[codefactor-image]: https://www.codefactor.io/repository/github/GetOlympus/olympus-code-field/badge?style=flat-square
[codefactor-url]: https://www.codefactor.io/repository/github/getolympus/olympus-code-field
[getoption-url]: https://developer.wordpress.org/reference/functions/get_option/
[license-blob]: https://github.com/GetOlympus/olympus-code-field/blob/master/LICENSE
[license-image]: https://img.shields.io/badge/license-MIT_License-blue.svg?style=flat-square
[license-url]: http://opensource.org/licenses/MIT
[packagist-image]: https://img.shields.io/packagist/v/getolympus/olympus-code-field.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/getolympus/olympus-code-field
[twitter-image]: https://img.shields.io/badge/crewstyle-blue.svg?style=social&logo=twitter
[twitter-url]: http://twitter.com/crewstyle