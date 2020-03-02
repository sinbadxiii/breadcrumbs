<?php

namespace Phalcon\Breadcrumbs\Microdata;

/**
 * Interface MicrodataAdapaterInterface
 * @package Phalcon\Breadcrumbs\Microdata
 */
interface MicrodataAdapaterInterface {
    public function injection(string $htmlCrumb, int $index);
    public function setTemplate(array $template);
    public function getTemplate(string $key);
}
