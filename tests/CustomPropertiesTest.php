<?php

namespace LaTevaWeb\CustomProperties\Tests;

class CustomPropertiesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testSetCustomProperty()
    {
        $this->fake->setCustomProperty('foo', 'bar');
        $property = $this->fake->custom_properties['foo'];

        $this->assertEquals('bar', $property);
    }

    public function testPersistSetCustomProperty()
    {
        $this->fake
            ->setCustomProperty('foo', 'bar')
            ->save();

        $this->assertDatabaseHas('fakes', [
            'id' => 1,
            'custom_properties' => json_encode(['foo' => 'bar']),
        ]);
    }

    public function testHasCustomProperty()
    {
        $this->fake->setCustomProperty('foo', 'bar');
        $has = $this->fake->hasCustomProperty('foo');
        $hasnot = $this->fake->hasCustomProperty('foo2');

        $this->assertTrue($has);
        $this->assertFalse($hasnot);
    }

    public function testGetCustomProperty()
    {
        $this->fake->setCustomProperty('foo', 'bar');
        $property = $this->fake->getCustomProperty('foo');
        $propertyEmpty = $this->fake->getCustomProperty('foo2');
        $propertyDefault = $this->fake->getCustomProperty('foo3', 'default');

        $this->assertEquals('bar', $property);
        $this->assertNull($propertyEmpty);
        $this->assertEquals('default', $propertyDefault);
    }

    public function testForgetCustomProperty()
    {
        $this->fake->setCustomProperty('foo', 'bar')->save();
        $this->fake->forgetCustomProperty('foo')->save();

        $this->assertDatabaseMissing('fakes', [
            'id' => 1,
            'custom_properties' => json_encode(['foo' => 'bar']),
        ]);
    }
}
