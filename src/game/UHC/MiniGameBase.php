<?php

namespace game\UHC;

/**
 * UHC PlugIn - MCPE Mini-Game
 *
 * Copyright (C) MCPE_PluginDev
 *
 * @author DavidJBrockway aka MCPE_PluginDev
 *        
 */


abstract class MiniGameBase {		
	protected $plugin;
	public function __construct(UHCPlugIn $plugin) {
		if($plugin === null){
			throw new \InvalidStateException("plugin may not be null");
		}
		$this->plugin = $plugin;
	}
	
	protected function getManager() {
		return $this->plugin->uhcManager;
	}
	protected function getPlugin() {
		return $this->plugin;
	}
	protected function getMsg($key) {
		return $this->plugin->uhcMessages->getMessageByKey ( $key );
	}
	protected function getSetup() {
		return $this->plugin->uhcSetup;
	}
	protected function getBuilder() {
		return $this->plugin->ctfBuilder;
	}
	
	protected function getGameKit() {
		return $this->plugin->uhcGameKit;
	}
	
	protected function getLog() {
		return $this->plugin->getLogger();
	}
	
	protected function log($msg) {
		return $this->plugin->getLogger()->info($msg);
	}
	
	protected function getConfig($key, $defaultValue=null) {
		return $this->plugin->getConfig ()->get ( $key, $defaultValue);
	}
	
	protected function setConfig($key, $value) {
		return $this->plugin->getConfig ()->set ( $key, $value );
	}
}
