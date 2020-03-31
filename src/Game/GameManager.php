<?php

namespace App\Game;

use App\Game\ChooseWinner\DetermineWinner;
use App\Player\PlayerInterface;

class GameManager
{
    /**
     * @var DetermineWinner
     */
    private $determiner;

    private $result = [];

    /**
     * GameManager constructor.
     * @param DetermineWinner $determineWinner
     */
    public function __construct(DetermineWinner $determineWinner)
    {
        $this->determiner = $determineWinner;
    }

    /**
     * @param PlayerInterface $playerA
     * @param PlayerInterface $playerB
     * @return string
     */
    public function determineWinner(PlayerInterface $playerA, PlayerInterface $playerB): string
    {
        $weaponA = $playerA->getWeapon();
        $weaponB = $playerB->getWeapon();
        $result = $this->determiner->determine($weaponA, $weaponB);

        $row = '%s VS  %s  result - %d';
        $this->saveResult($result);

        return sprintf($row, $weaponA->getName(), $weaponB->getName(), $result) . PHP_EOL;
    }

    /**
     * Print result games
     */
    public function getReport()
    {
        $m =  'REPORT:' . PHP_EOL;
        $m .= ' A (win) - ' . $this->result[1] ?? 0;
        $m .= ' B (win) - ' . $this->result[2] ?? 0;
        $m .=' DRAW - ' . $this->result[12] ?? 0;

        return $m;
    }

    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param string $result
     */
    private function saveResult(string $result)
    {
        if (isset($this->result[$result])) {
            $this->result[$result]++;
        } else {
            $this->result[$result] = 1;
        }
    }
}
