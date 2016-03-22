<?php

namespace game\UHC;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\TextFormat;


/**
 * UHC PlugIn - MCPE Mini-Game
 *
 * Copyright (C) MCPE_PluginDev
 *
 * @author DavidJBrockway aka MCPE_PluginDev
 *        
 */
class UHCPlugIn extends PluginBase implements CommandExecutor {
	
	// object variables
	//public $config;
	public $uhcBuilder;
	public $uhcManager;
	public uhcMessages
	public $uhcGameKit;
	public $uhcSetup;
	
	// keep track of all points
	public $redTeamPlayers = [ ];
	public $blueTeamPLayers = [ ];
	public $gameStats = [ ];
	
	// players with the flag
	public $playersWithRedFlag = [ ];
	public $playersWithBlueFlag = [ ];
	
	// keep game statistics
	public $gameMode = 0;
	public $gameState = 0;
	public $blueTeamWins = 0;
	public $redTeamWins = 0;
	public $pos_display_flag = 0;
	public $currentGameRound = 0;
	public $maxGameRound = 3;
	
	//lobby world
	public $UHCWorldName;

	//setup mode
	public $setupModeAction = "";
	
	/**
	 * OnLoad
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onLoad()
	 */
	public function onLoad() {		
		$this->initMinigameComponents();
	}

	/**
	 * OnEnable
	 *
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onEnable()
	 */
	public function onEnable() {	
		$this->initConfigFile ();				
		$this->enabled = true;
		$this->getServer ()->getPluginManager ()->registerEvents ( new CTFListener ( $this ), $this );
		$this->getLogger ()->info ( TextFormat::GREEN . "MCPE_PluginDev UHC Enabled v1.0.0"
		$this->getLogger ()->info ( TextFormat::GREEN . "-------------------------------------------------" );
		$this->initMessageTests();
		
		