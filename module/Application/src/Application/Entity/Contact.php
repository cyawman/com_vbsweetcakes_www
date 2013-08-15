<?php

namespace Application\Entity;

use Zend\Form\Annotation;

/**
 * @Annotation\Name("contact")
 */
class Contact {
    
    /**
     * @var string
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Name:"})
     */
    protected $name;
    
    /**
     * @var string
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Email:"})
     */
    protected $email;
    
    /**
     * @var string
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Phone:"})
     */
    protected $phone;
    
    /**
     * @var string
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Comments:"})
     */
    protected $comments;
    
    
}