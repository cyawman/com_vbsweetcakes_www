<?php

namespace Application\Entity;

use Zend\Form\Annotation;

/**
 * @Annotation\Name("contact")
 */
class Contact {
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Name:"})
     */
    protected $name;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Email:"})
     */
    protected $email;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Phone:"})
     */
    protected $phone;
    
    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     * @Annotation\Attributes({"type":"textarea"})
     * @Annotation\Options({"label":"Comments:"})
     */
    protected $comments;
    
    
}