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
            ),
            array(
                'label' => 'Showcase',
                'route' => 'showcase',
                'pages' => array(
                    array(
                        'label' => 'Wedding Cakes',
                        'route' => 'showcase/default',
                        'params' => array('album' => 'wedding-cakes'),
                        'pages' => array(
                            array(
                                'label' => 'Chocolate Fudge Cake with Cream Filling',
                                'route' => 'showcase/default',
                                'params' => array('album' => 'wedding-cakes', 'slug' => 'chocolate-fudge-cake-with-cream-filling'),
                            )
                        )
                    ),
                    array(
                        'label' => 'Seasonal Cakes',
                        'route' => 'showcase/default',
                        'params' => array('album' => 'seasonal-cakes'),
                        'pages' => array(
                            array(
                                'label' => 'Apple Cupcakes with Cinnamon Buttercream Frosting',
                                'route' => 'showcase/default',
                                'params' => array('album' => 'seasonal-cakes', 'slug' => 'apple-cupcakes-with-buttercream-frosting'),
                            )
                        )
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