<?php

namespace Intervention\Image\Tests\Drivers\Gd\Modifiers;

use Intervention\Image\Drivers\Gd\Modifiers\DrawPolygonModifier;
use Intervention\Image\Geometry\Point;
use Intervention\Image\Geometry\Polygon;
use Intervention\Image\Tests\TestCase;
use Intervention\Image\Tests\Traits\CanCreateGdTestImage;

/**
 * @requires extension gd
 * @covers \Intervention\Image\Drivers\Gd\Modifiers\DrawPixelModifier
 */
class DrawPolygonModifierTest extends TestCase
{
    use CanCreateGdTestImage;

    public function testApply(): void
    {
        $image = $this->createTestImage('trim.png');
        $this->assertEquals('00aef0', $image->pickColor(14, 14)->toHex());
        $drawable = new Polygon([new Point(0, 0), new Point(15, 15), new Point(20, 20)]);
        $drawable->background('b53717');
        $image->modify(new DrawPolygonModifier($drawable));
        $this->assertEquals('b53717', $image->pickColor(14, 14)->toHex());
    }
}