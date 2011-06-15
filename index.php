<?php
require 'bootstrap.php';

use Documents\Category;

$dm->getRepository('Documents\Category')
    ->createQueryBuilder()
    ->remove()
    ->getQuery()
    ->execute()
;

// Create a simple category
$category = new Category();
$category->setTitle('Root Category');
$dm->persist($category);

$child = new Category();
$child->setTitle('Test');
$child->setParent($category);
$dm->persist($child);

$child2 = new Category();
$child2->setTitle('Test #2');
$child2->setParent($category);
$dm->persist($child2);

$subChild = new Category();
$subChild->setTitle('Sub Child of Test #2');
$subChild->setParent($child2);
$dm->persist($child2);

$dm->flush();
$dm->clear();

// Get the repository for the category document
$repo = $dm->getRepository('Documents\Category');

// Fetch a category by path
$category = $repo->findOneBy(array('path' => 'root-category,'));

// Loop through the nodes children
echo $category->getTitle() . "<br />";
foreach ($repo->children($category) as $node)
{
	echo str_repeat('&nbsp;', 4) . $node->getTitle() . "<br />";
}

// Clear document manager
$dm->clear();

