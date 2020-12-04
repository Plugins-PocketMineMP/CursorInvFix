<?php

declare(strict_types=1);

namespace alvin0319\CursorInvFix;

use pocketmine\event\inventory\InventoryTransactionEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class CursorInvFix extends PluginBase implements Listener{

	public function onEnable() : void{
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	 * @param InventoryTransactionEvent $event
	 *
	 * @priority MONITOR
	 */
	public function onInventoryTransaction(InventoryTransactionEvent $event) : void{
		$player = $event->getTransaction()->getSource();
		if($event->isCancelled()){
			$player->getCursorInventory()->sendSlot(0, $player);
		}
	}
}