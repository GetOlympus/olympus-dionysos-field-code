<?php

namespace GetOlympus\Field;

use GetOlympus\Zeus\Field\Controller\Field;
use GetOlympus\Zeus\Translate\Controller\Translate;

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
     * Prepare variables.
     */
    protected function setVars()
    {
        $this->getModel()->setFaIcon('fa-code');
        $this->getModel()->setScript('js'.S.'code.js');
        $this->getModel()->setStyle('css'.S.'code.css');
        $this->getModel()->setTemplate('code.html.twig');
    }

    /**
     * Prepare HTML component.
     *
     * @param array $content
     * @param array $details
     */
    protected function getVars($content, $details = [])
    {
        // Build defaults
        $defaults = [
            'id' => '',
            'title' => Translate::t('code.title', [], 'codefield'),
            'description' => '',
            'change' => true,
            'readonly' => false,
            'rows' => 4,
            'modes' => $this->getCodeModes(),
            'default' => [
                'mode' => 'application/json',
                'code' => ''
            ],
        ];

        // Build defaults data
        $vars = array_merge($defaults, $content);
        $vars['default']['mode'] = $this->retrieveMode($vars['default']['mode']);

        // Retrieve field value
        $vars['val'] = $this->getValue($content['id'], $details, $vars['default']);

        // Update vars
        $this->getModel()->setVars($vars);
    }

    /**
     * Return all available modes.
     *
     * @return array $codes
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
     * @return array $modes
     */
    protected function getModes()
    {
        return [
            [
                'title' => Translate::t('code.modes.css', [], 'codefield'),
                'mode' => ['text/css', 'css'],
            ],
            [
                'title' => Translate::t('code.modes.diff', [], 'codefield'),
                'mode' => ['text/x-diff','x-diff','diff'],
            ],
            [
                'title' => Translate::t('code.modes.html', [], 'codefield'),
                'mode' => ['text/html','html'],
            ],
            [
                'title' => Translate::t('code.modes.js', [], 'codefield'),
                'mode' => ['text/javascript','javascript','js'],
            ],
            [
                'title' => Translate::t('code.modes.json', [], 'codefield'),
                'mode' => ['application/json','json'],
            ],
            [
                'title' => Translate::t('code.modes.md', [], 'codefield'),
                'mode' => ['text/x-markdown','markdown','md'],
            ],
            [
                'title' => Translate::t('code.modes.php', [], 'codefield'),
                'mode' => ['application/x-httpd-php','x-httpd-php','php'],
            ],
            [
                'title' => Translate::t('code.modes.python', [], 'codefield'),
                'mode' => ['text/x-python','x-python','python'],
            ],
            [
                'title' => Translate::t('code.modes.ruby', [], 'codefield'),
                'mode' => ['text/x-ruby','x-ruby','ruby'],
            ],
            [
                'title' => Translate::t('code.modes.sh', [], 'codefield'),
                'mode' => ['text/x-sh','x-sh','sh'],
            ],
            [
                'title' => Translate::t('code.modes.mysql', [], 'codefield'),
                'mode' => ['text/x-mysql','x-mysql','mysql'],
            ],
            [
                'title' => Translate::t('code.modes.mariadb', [], 'codefield'),
                'mode' => ['text/x-mariadb','x-mariadb','mariadb'],
            ],
            [
                'title' => Translate::t('code.modes.xml', [], 'codefield'),
                'mode' => ['application/xml','xml'],
            ],
            [
                'title' => Translate::t('code.modes.yaml', [], 'codefield'),
                'mode' => ['text/x-yaml','x-yaml','yaml'],
            ],
        ];
    }

    /**
     * Return all available modes.
     *
     * @param   string $search  Mode we are looking for
     * @return  string $good    Real mode name
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
