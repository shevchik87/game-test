<?php

namespace App\Command;

use App\Game\ChooseWinner\DetermineWinner;
use App\Game\ChooseWinner\WinnerStartegy\BuilderDetermineStrategy;
use App\Game\GameManager;
use App\Player\Player;
use App\Weapon\ChooseWeaponStrategy\OnlyOneWeaponStrategy;
use App\Weapon\ChooseWeaponStrategy\RandomWeaponStrategy;
use App\Weapon\WeaponBuilder;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GameCommand extends Command
{
    public static $defaultName = 'game:start';


    public function execute(InputInterface $input, OutputInterface $output)
    {
        $playerA = new Player('playerA');
        $playerA->setStrategyChooseWeapon(new OnlyOneWeaponStrategy());

        $playerB = new Player('playerB');
        $playerB->setStrategyChooseWeapon(new RandomWeaponStrategy(new WeaponBuilder()));

        $game = new GameManager(new DetermineWinner(new BuilderDetermineStrategy()));

        for ($i = 0; $i < 100; $i++) {
            $output->write($game->determineWinner($playerA, $playerB));
        }

        $game->getReport();

        return 1;
    }
}
