<?php

namespace Application\Entity;

use Zend\Form\Annotation;

/**
 * @Annotation\Name("costEstimator")
 */
class CostEstimator {

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"options":{"cake":"Cake","cupcakes":"Cupcakes","cakepops":"Cake Pops"}})
     * @Annotation\Options({"label":"Type:"})
     */
    protected $type;

    /**
     * @var string
     * @Annotation\Attributes({"type":"number","min":"10","max":"200","step":"10"})
     * @Annotation\Options({"label":"Servings:"})
     */
    protected $servings;

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"options":{"none":"None","chocolate":"Chocolate","vanilla":"Vanilla","strawberry":"Strawberry","lemon":"Lemon"}})
     * @Annotation\Options({"label":"Filling:"})
     */
    protected $filling;

    /**
     * @var string
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Attributes({"options":{"chocolate":"Chocolate","vanilla":"Vanilla","redvelvet":"Red Velvet","carrot":"Carrot Cake","strawberry":"Strawberry","lemon":"Lemon"}})
     * @Annotation\Options({"label":"Flavor:"})
     */
    protected $flavor;

}