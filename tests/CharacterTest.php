<?php

namespace tests;

use DndPhp\Character;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Character::class)]
class CharacterTest extends TestCase
{
  /**
   * @test
   */
  public function it_has_a_name()
  {
    $playerOne = new Character;
    $playerTwo = new Character("Orianna");

    $this->assertEquals("New Character", $playerOne->name());
    $this->assertEquals("Orianna", $playerTwo->name());
  }
}