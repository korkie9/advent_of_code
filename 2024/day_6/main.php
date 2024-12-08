<?php
require_once 'puzzle_1.php';
require_once 'puzzle_2.php';

$puzzle = new Puzzle1();
echo "Solution 1: " . $puzzle::solve() . "\n";
echo "Solution 2: " . Puzzle2::solve() . "\n";
