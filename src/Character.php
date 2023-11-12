<?php

namespace DndPhp;

use DndPhp\Classes\CharacterClass;
use DndPhp\Races\CharacterRace;
use ErrorException;

class Character
{
  private CharacterClass|null $class;
  private int $hitpoints;
  private string $name;
  private CharacterRace|null $race;

  public function __construct(string $name = "New Character", CharacterClass $class = null, CharacterRace $race = null, int $hitpoints = 1)
  {
    $this->class = $class;
    $this->hitpoints = $hitpoints;
    $this->name = $name;
    $this->race = $race;
  }

  /**
   * Return the character's class
   * 
   * @throws ErrorException
   */
  public function characterClass(): CharacterClass
  {
    if (is_null($this->class)) {
      throw new ErrorException("This character was not given a class when it was created.");
    }

    return $this->class;
  }

  /**
   * Return the character's race
   */
  public function characterRace()
  {
    if (is_null($this->race)) {
      throw new ErrorException("This character was not given a race when it was created.");
    }

    return $this->race;
  }

  public function harm(int $hitpoints = 1)
  {
    $this->hitpoints -= $hitpoints;

    return $this->hp();
  }

  public function heal(int $hitpoints = 1)
  {
    $this->hitpoints += $hitpoints;

    return $this->hp();
  }

  public function hp(): int
  {
    return $this->hitpoints;
  }
  
  public function name()
  {
    return $this->name;
  }
}