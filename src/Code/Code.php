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
     * @var string
     */
    protected $template = 'code.html.twig';

    /**
     * @var string
     */
    protected $textdomain = 'codefield';

    /**
     * Prepare defaults.
     *
     * @return array
     */
    protected function getDefaults()
    {
        return [
            'title' => Translate::t('code.title', $this->textdomain),
            'default' => '',
            'description' => '',
            'mode' => 'text/html',
            'rows' => 4,

            /**
             * code mirror settings
             * @see wp_get_code_editor_settings()
             */
            'settings' => [
                'indentUnit'     => 2,
                'indentWithTabs' => false,
                'tabSize'        => 2,
            ],

            // texts
            't_title' => Translate::t('code.formtitle', $this->textdomain),
            't_content' => Translate::t('code.formcontent', $this->textdomain),
        ];
    }

    /**
     * Prepare variables.
     *
     * @param  object  $value
     * @param  array   $contents
     *
     * @return array
     */
    protected function getVars($value, $contents)
    {
        // Get contents
        $vars = $contents;

        // Initialize code editor
        $vars['code_editor'] = wp_enqueue_code_editor([
            'type'       => $this->retrieveMode($vars['mode']),
            'codemirror' => $vars['settings'],
        ]);

        // Update vars
        return $vars;
    }

    /**
     * Return all available modes.
     *
     * @return array $modes
     */
    protected function getModes()
    {
        return [
            ['text/css', 'css'],
            ['text/x-diff', 'x-diff', 'diff'],
            ['text/html', 'html'],
            ['text/javascript', 'javascript', 'js'],
            ['application/json', 'json'],
            ['text/x-markdown', 'markdown', 'md'],
            ['application/x-httpd-php', 'x-httpd-php', 'php'],
            ['text/x-python', 'x-python', 'python'],
            ['text/x-ruby', 'x-ruby', 'ruby'],
            ['text/x-sh', 'x-sh', 'sh'],
            ['text/x-mysql', 'x-mysql', 'mysql'],
            ['text/x-mariadb', 'x-mariadb', 'mariadb'],
            ['application/xml', 'xml'],
            ['text/x-yaml', 'x-yaml', 'yaml'],
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
            if (in_array($search, $mode)) {
                return $mode[0];
            }
        }

        return 'text/html';
    }
}
