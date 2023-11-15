<?php

namespace tests;

use DndPhp\Character;
use DndPhp\Classes\CharacterClass;
use DndPhp\Races\CharacterRace;
use ErrorException;
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

  /**
   * @test
   */
  public function it_can_have_a_class()
  {
    $class = $this->createStub(CharacterClass::class);
    $bard = new Character("The Bard", new $class);

    $this->assertInstanceOf(CharacterClass::class, $bard->characterClass());
  }

  /**
   * @test
   */
  public function it_throws_an_error_without_a_class()
  {
    $classless = new Character("No Class");

    $this->expectException(ErrorException::class);

    $classless->characterClass();
  }

  /**
   * @test
   */
  public function it_can_have_a_race()
  {
    $race = $this->createStub(CharacterRace::class);
    $elf = new Character("The Elf", null, new $race);

    $this->assertInstanceOf(CharacterRace::class, $elf->characterRace());
  }

  /**
   * @test
   */
  public function it_throws_an_error_without_a_race()
  {
    $raceless = new Character("No Race");

    $this->expectException(ErrorException::class);

    $raceless->characterRace();
  }

  /**
   * @test
   */
  public function it_has_hit_points()
  {
    $playerOne = new Character("Has Hit Points");
    $playerTwo = new Character("Also Has Hit Points", null, null, 50);

    $this->assertEquals(1, $playerOne->hp());
    $this->assertEquals(50, $playerTwo->hp());
  }

  /**
   * @test
   */
  public function its_hit_points_can_be_raised()
  {
    $char = new Character("Heal me!");

    $this->assertEquals(2, $char->heal());
    $this->assertEquals(2, $char->hp());
    $this->assertEquals(5, $char->heal(3));
  }

  /**
   * @test
   */
  public function its_hit_points_can_be_lowered()
  {
    $char = new Character("Harm me!");
    $char->heal(9);

    $this->assertEquals(10, $char->hp());

    $this->assertEquals(9, $char->harm());
    $this->assertEquals(9, $char->hp());
    $this->assertEquals(5, $char->harm(4));
  }
}