<?php

/**
 * This file is part of the Phalcon Breadcrumbs.
 *
 * (c) Serghei Iakovlev <serghei@phalcon.io>
 *
 * For the full copyright and license information, please view the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace Phalcon\Breadcrumbs\Microdata;

/**
 * Class Schemeorg
 * @package Phalcon\Breadcrumbs\Microdata
 */
class Schemeorg implements MicrodataAdapaterInterface
{
    /**
     * @var array
     * <ol class="breadcrumbs" itemscope itemtype="https://schema.org/BreadcrumbList">
     *    {{ this.breadcrumbs.output() }}
     * </ol>
     */
    protected $template = [
        'linked' => '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
            <a href="{{link}}" title="{{label}}" itemprop="item">
                <span itemprop="name">{{label}}</span>
                <meta itemprop="position" content="{{position}}" />
            </a>
          </li>',
        'not-linked' => '<li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
               <span itemprop="name">{{label}}</span>
               <meta itemprop="position" content="{{position}}" />
          </li>',
    ];

    /**
     * @param string $htmlCrumb
     * @param int $index
     * @return string
     */
    public function injection(string $htmlCrumb, int $index)
    {
        $htmlCrumb = str_replace('{{position}}', $index, $htmlCrumb);
        return $htmlCrumb;
    }

    /**
     * @param array $template
     */
    public function setTemplate(array $template)
    {
        $this->template['linked'] = $template[0];
        $this->template['not-linked'] = $template[1];
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getTemplate(string $key)
    {
        return $this->template[$key];
    }
}
