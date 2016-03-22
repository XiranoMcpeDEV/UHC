<?php

namespace game\UHC;

use pocketmine\utils\TextFormat;

/**
 * UHC PlugIn - MCPE Mini-Game
 *
 * Copyright (C) MCPE_PluginDev
 *
 * @author DavidJBrockway aka MCPE_PluginDev
 *        
 */
class TestMessages extends MiniGameBase {

	public function __construct(UHCPlugIn $plugin) {
		parent::__construct ( $plugin );
		$this->uhcmsg = new UHCMessageslugin);
	}
	
	public function runTests() {
		$this->testMessage("uhc.name");
		$this->testMessage("uhc.status");		
		$this->testMessage("team.scores.score");		
		$this->testMessage("uhc.error.no-permission");
		$this->testMessage("uhc.error.not-game-stop");
		$this->testMessage("uhc.setup.success");
		$this->testMessage("uhc.setup.failed");
		$this->testMessage("uhc.setup.select");
		$this->testMessage("uhc.setup.action");				
		$this->testMessage("arena.created");
		$this->testMessage("block.display-on");
		$this->testMessage("block.display-off");
		$this->testMessage("team.join-blue" );
		$this->testMessage("team.join-red");
		$this->testMessage("game.player-left" );
		$this->testMessage("game.player-stop" );		
		$this->testMessage("game.player-start");
		$this->testMessage("game.stats");
		$this->testMessage("team.scores.score");
		$this->testMessage("team.scores.red-players");		
		$this->testMessage("team.scores.players");
		$this->testMessage("team.scores.round");
		$this->testMessage("team.scores.blue-players");		
		$this->testMessage("team.scores.redteam-wins");
		$this->testMessage("team.scores.blueteam-wins");
		$this->testMessage("game.in-progress");
		$this->testMessage("game.new-game");		
		$this->testMessage("uhc.error.blueteam-flag-exist" );
		$this->testMessage("uhc.conglatulations");
		$this->testMessage("uhc.red-team.capturedflag");
		$this->testMessage("uhc.blue-team.score");
		$this->testMessage("uhc.red-team.score");
		$this->testMessage("uhc.error.redteam-flag-exist" );		
		$this->testMessage("uhc.conglatulations");
		$this->testMessage("uhc.blue-team.capturedflag");
		$this->testMessage("uhc.blue-team.score" );
		$this->testMessage("uhc.red-team.score" );		
		$this->testMessage("game.getready");		
		$this->testMessage("game.nextround");	
		$this->testMessage("game.roundstart");
		$this->testMessage("uhc.finished");
		$this->testMessage("game.ticks");		
		$this->testMessage("uhc.finished");
		$this->testMessage("team.welcome-blue");		
		$this->testMessage("team.tap-start");
		$this->testMessage("team.blue");
		$this->testMessage("team.joined-blue");
		$this->testMessage("team.members");	
		$this->testMessage("team.welcome-red");		
		$this->testMessage("team.tap-start");		
		$this->testMessage("team.red" );
		$this->testMessage("team.joined-red");
		$this->testMessage("team.members");		
		$this->testMessage("game.remove-equipment");
		$this->testMessage("uhc.left-game");		
		$this->testMessage( "game.stop");
		$this->testMessage("uhc.return-waiting-area");
		$this->testMessage("team.scores.red-players" );
		$this->testMessage("team.scores.players");		
		$this->testMessage("game.full" );
		$this->testMessage("team.scores.blue-players" );
		$this->testMessage("team.scores.players" );		
		$this->testMessage("game.resetting");
		$this->testMessage("uhc.spawn_player");		
		$this->testMessage("sign.world-not-found");
		$this->testMessage("sign.teleport.spawn");
		$this->testMessage("sign.teleport.uhc");
		$this->testMessage("uhc.error.wrong-sender");		
		$this->testMessage("game.not-enought-players");
		$this->testMessage("game.in-progress");		
		$this->testMessage("game.hit-stop" );
		$this->testMessage("game.round");
		$this->testMessage("game.go");
		$this->testMessage("uhc.return-flag");
		$this->testMessage("team.left-blue");
		$this->testMessage("uhc.return-flag");
		$this->testMessage("game.final.draw");
		$this->testMessage("game.final.red-win");		
		$this->testMessage("game.final.blue-win");				
		$this->testMessage("sign.world-not-found");
		$this->testMessage("sign.teleport.world");		
		$this->testMessage("sign.teleport.game");		
		$this->testMessage("sign.done" );
		$this->testMessage("game.start-equipment");
	}
	
	public function testMessage($key) {
		$value = $this->getMsg($key);
		if ($value==null) {
			$value = TextFormat::RED ."* KEY NOT FOUND !!!";
		}
		if ($key==$value) {
			$value = TextFormat::RED ."* KEY NOT FOUND !!!";
		}
		$this->getPlugIn()->getLogger()->info($key." = ".$value);
	}
}
