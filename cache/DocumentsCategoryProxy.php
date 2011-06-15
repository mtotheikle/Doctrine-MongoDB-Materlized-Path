<?php

namespace Proxies;

use Doctrine\ODM\MongoDB\Persisters\DocumentPersister;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class DocumentsCategoryProxy extends \Documents\Category implements \Doctrine\ODM\MongoDB\Proxy\Proxy
{
    private $documentPersister;
    private $identifier;
    public $__isInitialized__ = false;
    public function __construct(DocumentPersister $documentPersister, $identifier)
    {
        $this->documentPersister = $documentPersister;
        $this->identifier = $identifier;
    }
    private function __load()
    {
        if (!$this->__isInitialized__ && $this->documentPersister) {
            $this->__isInitialized__ = true;
            if ($this->documentPersister->load($this->identifier, $this) === null) {
                throw \Doctrine\ODM\MongoDB\MongoDBException::documentNotFound(get_class($this), $this->identifier);
            }
            unset($this->documentPersister, $this->identifier);
        }
    }

    
    public function getId()
    {
        $this->__load();
        return parent::getId();
    }

    public function setTitle($title)
    {
        $this->__load();
        return parent::setTitle($title);
    }

    public function getTitle()
    {
        $this->__load();
        return parent::getTitle();
    }

    public function setPath($path)
    {
        $this->__load();
        return parent::setPath($path);
    }

    public function getPath()
    {
        $this->__load();
        return parent::getPath();
    }

    public function setParent(\Documents\Category $parent)
    {
        $this->__load();
        return parent::setParent($parent);
    }

    public function getParent()
    {
        $this->__load();
        return parent::getParent();
    }

    public function getSortOrder()
    {
        $this->__load();
        return parent::getSortOrder();
    }

    public function getChildCount()
    {
        $this->__load();
        return parent::getChildCount();
    }


    public function __sleep()
    {
        return array('id', 'title', 'path', 'parent', 'sortOrder', 'childCount');
    }
}