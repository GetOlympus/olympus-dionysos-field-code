<img src="https://github.com/GetOlympus/olympus-dionysos-field-code/blob/master/assets/field-code.png" align="left" />

# Dionysos Code Field

[![Olympus Component][olympus-image]][olympus-url]
[![CodeFactor Grade][codefactor-image]][codefactor-url]
[![Packagist Version][packagist-image]][packagist-url]
[![MIT][license-image]][license-blob]

> This component is a part of the **Olympus Dionysos fields** for **WordPress**.  
> It uses the default WordPress code field made with a complete integration with codemirror JS component.

```sh
composer require getolympus/olympus-dionysos-field-code
```

---

## Table of contents

[Field initialization](#field-initialization) • [Variables definition](#variables-definition) • [Accepted mode](#accepted-mode) • [Retrive data](#retrive-data) • [Release History](#release-history) • [Contributing](#contributing)

---

## Field initialization

Use the following lines to add a `code field` in your **WordPress** admin pages or custom post type meta fields:

```php
return \GetOlympus\Dionysos\Field\Code::build('my_code_field_id', [
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

## Variables definition

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

## Release history

| Version | Note |
| :------ | :--- |
| 0.0.13  | Add new CodeMirror css for widget integration |
| 0.0.12  | New Olympus components compatibility<br/>Change repository to be a part of Dionysos fields |
| 0.0.11  | Fix json encoder in twig source file |

## Contributing

1. Fork it (<https://github.com/GetOlympus/olympus-dionysos-field-code/fork>)
2. Create your feature branch (`git checkout -b feature/fooBar`)
3. Commit your changes (`git commit -am 'Add some fooBar'`)
4. Push to the branch (`git push origin feature/fooBar`)
5. Create a new Pull Request

---

**Built with ♥ by [Achraf Chouk](https://github.com/crewstyle "Achraf Chouk") ~ (c) since a long time.**

<!-- links & imgs dfn's -->
[olympus-image]: https://img.shields.io/badge/for-Olympus-44cc11.svg?style=flat-square
[olympus-url]: https://github.com/GetOlympus
[codefactor-image]: https://www.codefactor.io/repository/github/GetOlympus/olympus-dionysos-field-code/badge?style=flat-square
[codefactor-url]: https://www.codefactor.io/repository/github/getolympus/olympus-dionysos-field-code
[getoption-url]: https://developer.wordpress.org/reference/functions/get_option/
[license-blob]: https://github.com/GetOlympus/olympus-dionysos-field-code/blob/master/LICENSE
[license-image]: https://img.shields.io/badge/license-MIT_License-blue.svg?style=flat-square
[packagist-image]: https://img.shields.io/packagist/v/getolympus/olympus-dionysos-field-code.svg?style=flat-square
[packagist-url]: https://packagist.org/packages/getolympus/olympus-dionysos-field-code