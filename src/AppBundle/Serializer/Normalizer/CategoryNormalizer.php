<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 15/03/2017
 * Time: 14:51
 */

namespace AppBundle\Serializer\Normalizer;

use AppBundle\Entity\Category;
use AppBundle\Manager\PriceManager;
use AppBundle\Manager\TravelManager;
use AppBundle\Manager\TravelRateManager;
/**
 * UserNormalizer.
 */
class CategoryNormalizer extends AbstractNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize($object, $format = null, array $context = [])
    {
        /* @var Category $object */
        $data = [
            'id' => $object->getId(),
            'name' => $object->getName(),
        ];
        return $data;
    }
    /**
     * {@inheritdoc}
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Category;
    }
}