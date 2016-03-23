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
	public $greenTeamPlayers = [ ];
	public $yellowTeamPLayers = [ ];
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
		
		/check if everything initializared
		if ($this->uhcManager==null) {
			$this->getLogger()->info(" manager not initialized properly");
		}		
		if ($this->uhcSetup==null) {
			$this->getLogger()->info(" setup not initialized properly");
		}
		if ($this->uhcMessages==null) {
			$this->getLogger()->info(" messages not initialized properly");
		}
		if ($this->uhcBuilder==null) {
			$this->getLogger()->info(" builder not initialized properly");
		}
		if ($this->uhcGameKit==null) {
			$this->getLogger()->info(" gamekit not initialized properly");
		}
	}
	
	private function initMinigameComponents() {
		try {
		$this->uhcfSetup = new UHCSetup ( $this );
		$this->uhcfMessages = new UHCMessages ( $this );
		$this->uhcManager = new UHCManager ( $this );		
		$this->uhcBuilder = new UHCBlockBuilder ( $this );
		$this->uhcGameKit = new UHCGameKit ( $this );
		} catch ( \Exception $ex ) {
			$this->getLogger ()->error( $ex->getMessage() );
		}
	}
	
	private function initConfigFile() {
		try {
			$this->saveDefaultConfig ();
			if (! file_exists ( $this->getDataFolder () )) {
				@mkdir ( $this->getDataFolder (), 0777, true );
				file_put_contents ( $this->getDataFolder () . "config.yml", $this->getResource ( "config.yml" ) );
			}
			$this->reloadConfig ();
			$this->getConfig ()->getAll ();
			
			//set game world
			$this->UHCWorldName = $this->UHCSetup->getUHCWorldName();			
		} catch ( \Exception $e ) {
			$this->getLogger ()->error ( $e->getMessage());
		}
	}
	
	private function initMessageTests() {
		if ($this->getConfig ()->get ( "run_selftest_message" ) == "YES") {
			$stmsg = new TestMessages ( $this );
			$stmsg->runTests ();
		}
	}
	
	/**
	 * OnDisable
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onDisable()
	 */
	public function onDisable() {
		$this->getLogger ()->info ( TextFormat::RED . $this->uhcMessages->getMessageByKey ( "plugin.disable" ) );
		$this->enabled = false;
	}
	
	public function setGameMode($mode) {
		$this->gameMode = $mode;
	}
	
	public function getGameMode() {
		return $this->gameMode;
	}
	
	public function clearSetup() {
		$this->setupModeAction="";
	}
	
	/**
	 * OnCommand
	 * (non-PHPdoc)
	 *
	 * @see \pocketmine\plugin\PluginBase::onCommand()
	 */
	public function onCommand(CommandSender $sender, Command $command, $label, array $args) {
		$this->uhcManager->onCommand ( $sender, $command, $label, $args );
	}
