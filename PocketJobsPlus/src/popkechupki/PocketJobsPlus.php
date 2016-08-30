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
        $this->getLogger()->info(TextFormat::GREEN."PocketJobsPlusを読み込みました！");
        $this->getLogger()->info(TextFormat::RED."このプラグインはpopke LICENSEに同意した上で使用してください。");
    /*Create Config Files*/
        if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0740, true);
        $this->break = new Config($this->getDataFolder()."break.yml", Config::YAML, 
            array(
                '1' => array('name' => '焼き石', 'meta' => 0, 'amount' => 2 ),
                '2' => array('name' => '草ブロック', 'meta' => 0, 'amount' => 2 ),
                '3' => array('name' => '土', 'meta' => 0, 'amount' => 2 ),
                '4' => array('name' => '丸石', 'meta' => 0, 'amount' => 10 ),
                '5' => array('name' => '木材', 'meta' => 0, 'amount' => 10 ),
                '12' => array('name' => '砂', 'meta' => 0, 'amount' => 2 ),
                '13' => array('name' => '砂利', 'meta' => 0, 'amount' => 2 ),
                '14' => array('name' => '金鉱石', 'meta' => 0, 'amount' => 30 ),
                '15' => array('name' => '鉄鉱石', 'meta' => 0, 'amount' => 30 ),
                '16' => array('name' => '石炭鉱石', 'meta' => 0, 'amount' => 20 ),
                '17' => array('name' => '原木', 'meta' => 0, 'amount' => 20 ),
                '18' => array('name' => '葉ブロック', 'meta' => 0, 'amount' => 2 ),
                '21' => array('name' => 'ラピスラズリ鉱石', 'meta' => 0, 'amount' => 25 ),
                '24' => array('name' => '砂岩', 'meta' => 0, 'amount' => 10 ),
                '56' => array('name' => 'ダイヤモンド鉱石', 'meta' => 0, 'amount' => 100 ),
                '59' => array('name' => '小麦', 'meta' => 0, 'amount' => 5 ),
                '73' => array('name' => 'レッドストーン鉱石', 'meta' => 0, 'amount' => 25 ),
                '80' => array('name' => '雪ブロック', 'meta' => 0, 'amount' => 10 ),
                '82' => array('name' => '粘土ブロック', 'meta' => 0, 'amount' => 5 ),
                '86' => array('name' => 'かぼちゃ', 'meta' => 0, 'amount' => 5 ),
                '87' => array('name' => 'ネザーラック', 'meta' => 0, 'amount' => 2 ),
                '88' => array('name' => 'ソウルサンド', 'meta' => 0, 'amount' => 2 ),
                '89' => array('name' => 'グロウストーン', 'meta' => 0, 'amount' => 25 ),
                '103' => array('name' => 'スイカブロック', 'meta' => 0, 'amount' => 2 )
            ));
        $this->break->save();
        $this->paste = new Config($this->getDataFolder()."paste.yml", Config::YAML);
    /*PocketMoneyAPI Road*/
        if ($this->getServer()->getPluginManager()->getPlugin("PocketMoney") != null) {
            $this->PocketMoney = $this->getServer()->getPluginManager()->getPlugin("PocketMoney");
        } else {
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
	}

	public function onPlayerlockBreak(BlockBreakEvent $event) {
		$user = $event->getPlayer()->getName();
        $bid = $event->getBlock()->getId();
        $bd = $event->getBlock()->getDamage();
        $all = $this->break->getAll()[$bid];
        if ($this->break->exists($bid)) {
            if ($bd == $all["meta"]) {
                $this->PocketMoney->grantMoney($user, + $all["amount"]);
            }
        }
	}

}
