<?php

namespace popkechupki;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class PocketJobsPlus extends PluginBase implements Listener {

	public function onEnable() {   
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    /*Default Messages*/
        $this->getLogger()->info(TextFormat::GREEN."PocketJobsPlusを読み込みました".TextFormat::GOLD." By popkechupki");
        $this->getLogger()->info(TextFormat::RED."このプラグインはpopke LICENSEに同意した上で使用してください。");
    /*Create Config Files*/
        if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0740, true);
        $this->break = new Config($this->getDataFolder()."break.yml", Config::YAML, 
            array(
                '焼き石' => array(
                    array('ID' => 1, 'meta' => 0, 'amount' => 2 )),
                '草ブロック' => array(
                    array('ID' => 2, 'meta' => 0, 'amount' => 2 )),
                '土' => array(
                    array('ID' => 3, 'meta' => 0, 'amount' => 2 )),
                '丸石' => array(
                    array('ID' => 4, 'meta' => 0, 'amount' => 10 )),
                '木材' => array(
                    array('ID' => 5, 'meta' => 0, 'amount' => 10 )),
                '砂' => array(
                    array('ID' => 12, 'meta' => 0, 'amount' => 2 )),
                '砂利' => array(
                    array('ID' => 13, 'meta' => 0, 'amount' => 2 )),
                '金鉱石' => array(
                    array('ID' => 14, 'meta' => 0, 'amount' => 30 )),
                '鉄鉱石' => array(
                    array('ID' => 15, 'meta' => 0, 'amount' => 30 )),
                '石炭鉱石' => array(
                    array('ID' => 16, 'meta' => 0, 'amount' => 20 )),
                '原木' => array(
                    array('ID' => 17, 'meta' => 0, 'amount' => 20 )),
                '葉ブロック' => array(
                    array('ID' => 18, 'meta' => 0, 'amount' => 2 )),
                'ラピスラズリ鉱石' => array(
                    array('ID' => 21, 'meta' => 0, 'amount' => 25 )),
                '砂岩' => array(
                    array('ID' => 24, 'meta' => 0, 'amount' => 10 )),
                'ダイヤモンド鉱石' => array(
                    array('ID' => 56, 'meta' => 0, 'amount' => 100 )),
                '小麦' => array(
                    array('ID' => 59, 'meta' => 0, 'amount' => 5 )),
                'レッドストーン鉱石' => array(
                    array('ID' => 73, 'meta' => 0, 'amount' => 25 )),
                '雪ブロック' => array(
                    array('ID' => 80, 'meta' => 0, 'amount' => 10 )),
                '粘土ブロック' => array(
                    array('ID' => 82, 'meta' => 0, 'amount' => 5 )),
                'かぼちゃ' => array(
                    array('ID' => 86, 'meta' => 0, 'amount' => 5 )),
                'ネザーラック' => array(
                    array('ID' => 87, 'meta' => 0, 'amount' => 2 )),
                'ソウルサンド' => array(
                    array('ID' => 88, 'meta' => 0, 'amount' => 2 )),
                'グロウストーン' => array(
                    array('ID' => 89, 'meta' => 0, 'amount' => 25 )),
                'スイカブロック' => array(
                    array('ID' => 103, 'meta' => 0, 'amount' => 2 )),
            ));
        $this->paste = new Config($this->getDataFolder()."paste.yml", Config::YAML);
    /*PocketMoneyAPI Road*/
        if($this->getServer()->getPluginManager()->getPlugin("PocketMoney") != null) {
            //$this->PocketMoney = $this->getServer()->getPluginManager()->getPlugin("PocketMoney");
        } else {
            //$this->getServer()->getPluginManager()->disablePlugin($this);
        }
	}

	public function onPlayerlockBreak(BlockBreakEvent $event) {
		$user = $event->getPlayer()->getName();
	}
}
