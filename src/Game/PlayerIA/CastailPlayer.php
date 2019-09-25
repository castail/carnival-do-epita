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
      if ($this->result->getLastChoiceFor($this->mySide) == 0) {
        return parent::paperChoice();
      }
      $rockCount = 0;
      $paperCount = 0;
      $scissorsCount = 0;
      for ($i = 1; $i <= $this->result->getNbRound(); $i++) {
        //$stats = $this->result->getStatsFor($this->opponentSide);
        //$this->prettyDisplay(var_dump($stats[score]));
        if ($this->result->getLastChoiceFor($this->opponentSide) == 'rock')
          $rockCount++;
        if ($this->result->getLastChoiceFor($this->opponentSide) == 'paper')
          $paperCount++;
        if ($this->result->getLastChoiceFor($this->opponentSide) == 'scissors')
          $scissorsCount++;
        if ($rockCount > $paperCount) {
          if ($scissorsCount > $rockCount)
            return parent::rockChoice();
          return parent::paperChoice();
        }
        return parent::scissorsChoice();
      }

      //var_dump
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
       // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
        
        return parent::paperChoice();            
  }
};
