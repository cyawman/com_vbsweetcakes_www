<?php

return array(
    'navigation' => array(
        'site' => array(
            array(
                'label' => 'Home',
                'route' => 'home',
            ),
            array(
                'label' => 'Menu',
                'route' => 'menu',
                'pages' => array(
                    array(
                        'label' => 'Cost Estimator',
                        'route' => 'menu/default',
                        'action' => 'estimate-cost'
                    )
                )
            ),
            array(
                'label' => 'Showcase',
                'route' => 'showcase',
                'pages' => array(
                    array(
                        'label' => 'Wedding Cakes',
                        'route' => 'showcase/default',
                        'params' => array('album' => 'wedding-cakes')
                    )
                )
            ),
            array(
                'label' => 'Blog',
                'route' => 'blog',
                'pages' => array(
                    array(
                        'label' => 'Halloween Cakes & Cupcakes',
                        'route' => 'blog/default',
                        'params' => array('slug' => 'halloween-cakes-and-cupcakes')
                    )
                )
            ),
            array(
                'label' => 'About',
                'route' => 'home/default',
                'use_route_match' => true,
                'params' => array('slug' => 'about')
            ),
            array(
                'label' => 'Contact',
                'route' => 'contact',
            )
        )
    ),
);