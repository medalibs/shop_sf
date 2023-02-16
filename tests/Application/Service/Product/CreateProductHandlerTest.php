<?php

namespace App\Tests\Application\Service\Product;

use App\Application\Service\Product\CreateProductHandler;
use PHPUnit\Framework\TestCase;

class CreateProductHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $createProductHandler = new CreateProductHandler();
        $product = $createProductHandler->create($name = 'Product 1',$image ='http://www.myimage.com/img.png');

        self::assertEquals($name, $product->getName());
        self::assertEquals($image, $product->getImage());
        self::assertNull($product->getId());

    }
}