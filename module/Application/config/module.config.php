<?php

/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
return array(
    'console' => array(
        'router' => array(),
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[:slug]',
                            'constraints' => array(
                                'slug' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            ),
                        ),
                    ),
                ),
            ),
            'sitemap' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/sitemap.xml',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'sitemap',
                    ),
                ),
            ),
            'success' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/success',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'success',
                    ),
                ),
            ),
            'contact' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/contact',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'contact',
                    ),
                ),
            ),
            'blog' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/blog',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Blog',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:slug]',
                            'constraints' => array(
                                'slug' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'view'
                            ),
                        ),
                    ),
                ),
            ),
            'menu' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/menu',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Menu',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:action]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                        ),
                    ),
                ),
            ),
            'rss' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/rss',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Index',
                        'action' => 'rss'
                    )
                )
            ),
            'showcase' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/showcase',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller' => 'Showcase',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '/[:album[/:slug]]',
                            'constraints' => array(
                                'album' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'slug' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'action' => 'album'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Blog' => 'Application\Controller\BlogController',
            'Application\Controller\Menu' => 'Application\Controller\MenuController',
            'Application\Controller\Showcase' => 'Application\Controller\ShowcaseController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'layout/interactive' => __DIR__ . '/../view/layout/interactive.phtml',
            'layout/disqus' => __DIR__ . '/../view/layout/partial/disqus.phtml',
            'layout/site-navigation' => __DIR__ . '/../view/layout/partial/site-navigation.phtml',
            'layout/breadcrumbs' => __DIR__ . '/../view/layout/partial/breadcrumbs.phtml',
            'layout/header' => __DIR__ . '/../view/layout/partial/header.phtml',
            'layout/footer' => __DIR__ . '/../view/layout/partial/footer.phtml',
            'layout/google-analytics' => __DIR__ . '/../view/layout/partial/google-analytics.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);