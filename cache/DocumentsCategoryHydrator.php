<?php

namespace Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\UnitOfWork;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class DocumentsCategoryHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate($document, $data)
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id'])) {
            $value = $data['_id'];
            $return = (string) $value;
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['title'])) {
            $value = $data['title'];
            $return = (string) $value;
            $this->class->reflFields['title']->setValue($document, $return);
            $hydratedData['title'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['path'])) {
            $value = $data['path'];
            $return = (string) $value;
            $this->class->reflFields['path']->setValue($document, $return);
            $hydratedData['path'] = $return;
        }

        /** @ReferenceOne */
        if (isset($data['parent'])) {
            $reference = $data['parent'];
            $className = $this->dm->getClassNameFromDiscriminatorValue($this->class->fieldMappings['parent'], $reference);
            $targetMetadata = $this->dm->getClassMetadata($className);
            $id = $targetMetadata->getPHPIdentifierValue($reference['$id']);
            $return = $this->dm->getReference($className, $id);
            $this->class->reflFields['parent']->setValue($document, $return);
            $hydratedData['parent'] = $return;
        }

        /** @Field(type="increment") */
        if (isset($data['sortOrder'])) {
            $value = $data['sortOrder'];
            $return = $value;
            $this->class->reflFields['sortOrder']->setValue($document, $return);
            $hydratedData['sortOrder'] = $return;
        }

        /** @Field(type="increment") */
        if (isset($data['childCount'])) {
            $value = $data['childCount'];
            $return = $value;
            $this->class->reflFields['childCount']->setValue($document, $return);
            $hydratedData['childCount'] = $return;
        }
        return $hydratedData;
    }
}