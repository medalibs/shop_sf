<?php

namespace App\Tests\Application\Service\Product;

use App\Application\Service\Product\CreateProductFactory;
use App\Application\Service\Product\CreateProductHandler;
use PHPUnit\Framework\TestCase;

class CreateProductFactoryTest extends TestCase
{
    public function testFactory(): void
    {

        $createProductFactory = new CreateProductFactory(new CreateProductHandler());
        $product = $createProductFactory->create($name = 'Product 2',$image ='http://www.myimage.com/img2.png');

        self::assertEquals($name, $product->getName());
        self::assertEquals($image, $product->getImage());
        self::assertNull($product->getId());
    }
}