<?php

class Coord
{
  function __construct(int $y, int $x)
  {
    $this->yindex = $y;
    $this->xindex = $x;
  }

  public function setNewCoord($yind, $xind): void
  {

    $this->yindex = $yind;
    $this->xindex = $xind;
  }
  public int $yindex;
  public int $xindex;
}
