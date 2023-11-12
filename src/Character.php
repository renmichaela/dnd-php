<?php

namespace DndPhp;

class Character
{
  private string $name;

  public function __construct(string $name = "New Character")
  {
    $this->name = $name;
  }
  
  public function name()
  {
    return $this->name;
  }
}