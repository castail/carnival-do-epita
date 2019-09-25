<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class PaperPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class CastailPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
      // first round
      if ($this->result->getLastChoiceFor($this->mySide) == 0)
        return parent::paperChoice();
      // frequency counting strategy
      $rockCount = 0;
      $paperCount = 0;
      $scissorsCount = 0;
      for ($i = 1; $i <= $this->result->getNbRound(); $i++) {
        $lastChoice = $this->result->getLastChoiceFor($this->opponentSide);

        if ($lastChoice == 'rock')
          $rockCount++;
        if ($lastChoice == 'paper')
          $paperCount++;
        if ($lastChoice == 'scissors')
          $scissorsCount++;

        if ($rockCount > $paperCount) {
          if ($scissorsCount > $rockCount)
            return parent::rockChoice();
          return parent::paperChoice();
        }
        return parent::scissorsChoice();
      }
      return parent::paperChoice();            
  }
};
