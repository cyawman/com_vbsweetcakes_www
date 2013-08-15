<?php

namespace Application\Navigation\Service;

use Zend\Navigation\Service\DefaultNavigationFactory;

class SiteNavigationFactory extends DefaultNavigationFactory {

    protected function getName() {
        return 'site';
    }

}