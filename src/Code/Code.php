<?php

namespace GetOlympus\Field;

use GetOlympus\Hera\Controllers\Field;
use GetOlympus\Hera\Controllers\Translate;

/**
 * Builds Code field.
 *
 * @package Field
 * @subpackage Code
 * @author Achraf Chouk <achrafchouk@gmail.com>
 * @since 0.0.1
 *
 * @see https://olympus.readme.io/v1.0/docs/code-field
 *
 */

class Code extends Field
{
    /**
     * @var string
     */
    protected $faIcon = 'fa-code';

    /**
     * @var string
     */
    protected $template = 'code.html.twig';

    /**
     * Prepare HTML component.
     *
     * @param array $content
     * @param array $details
     *
     * @since 0.0.1
     */
    protected function getVars($content, $details = [])
    {
        // Build defaults
        $defaults = [
            'id' => '',
            'title' => Translate::t('code.title'),
            'description' => '',
            'change' => true,
            'readonly' => false,
            'rows' => 4,
            'default' => [],
            'modes' => $this->getCodeModes(),

            // details
            'post' => 0,
            'prefix' => '',
            'template' => 'pages',

            // defaults
            'default' => [
                'mode' => 'application/json',
                'code' => ''
            ],
        ];

        // Build defaults data
        $vars = array_merge($defaults, $content);
        $vars['default']['mode'] = $this->retrieveMode($vars['default']['mode']);

        // Retrieve field value
        $vars['val'] = $this->getValue($details, $vars['default'], $content['id'], true);

        // Update vars
        $this->getField()->setVars($vars);
    }

    /**
     * Return all available modes.
     *
     * @return array $array
     *
     * @since 0.0.1
     */
    protected function getCodeModes()
    {
        // List all modes
        $modes = $this->getModes();
        $codemodes = [];

        // Build select
        foreach ($modes as $mode) {
            $codemodes[$mode['mode'][0]] = $mode['title'];
        }

        return $codemodes;
    }

    /**
     * Return all available modes.
     *
     * @return array $array
     *
     * @since 0.0.1
     */
    protected function getModes()
    {
        return [
            [
                'title' => Translate::t('code.modes.css'),
                'mode' => ['text/css', 'css'],
            ],
            [
                'title' => Translate::t('code.modes.diff'),
                'mode' => ['text/x-diff','x-diff','diff'],
            ],
            [
                'title' => Translate::t('code.modes.html'),
                'mode' => ['text/html','html'],
            ],
            [
                'title' => Translate::t('code.modes.js'),
                'mode' => ['text/javascript','javascript','js'],
            ],
            [
                'title' => Translate::t('code.modes.json'),
                'mode' => ['application/json','json'],
            ],
            [
                'title' => Translate::t('code.modes.md'),
                'mode' => ['text/x-markdown','markdown','md'],
            ],
            [
                'title' => Translate::t('code.modes.php'),
                'mode' => ['application/x-httpd-php','x-httpd-php','php'],
            ],
            [
                'title' => Translate::t('code.modes.python'),
                'mode' => ['text/x-python','x-python','python'],
            ],
            [
                'title' => Translate::t('code.modes.ruby'),
                'mode' => ['text/x-ruby','x-ruby','ruby'],
            ],
            [
                'title' => Translate::t('code.modes.sh'),
                'mode' => ['text/x-sh','x-sh','sh'],
            ],
            [
                'title' => Translate::t('code.modes.mysql'),
                'mode' => ['text/x-mysql','x-mysql','mysql'],
            ],
            [
                'title' => Translate::t('code.modes.mariadb'),
                'mode' => ['text/x-mariadb','x-mariadb','mariadb'],
            ],
            [
                'title' => Translate::t('code.modes.xml'),
                'mode' => ['application/xml','xml'],
            ],
            [
                'title' => Translate::t('code.modes.yaml'),
                'mode' => ['text/x-yaml','x-yaml','yaml'],
            ],
        ];
    }

    /**
     * Return all available modes.
     *
     * @param string $search Mode we are looking for
     * @return string $good Real mode name
     *
     * @since 0.0.1
     */
    protected function retrieveMode($search)
    {
        // List all modes
        $modes = $this->getModes();

        // Build select
        foreach ($modes as $mode) {
            if (in_array($search, $mode['mode'])) {
                return $mode['mode'][0];
            }
        }

        return 'application/json';
    }
}
