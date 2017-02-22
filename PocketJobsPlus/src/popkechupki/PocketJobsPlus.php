<?php

namespace popkechupki;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;
use pocketmine\event\block\BlockPlaceEvent;
use pocketmine\block\Block;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class PocketJobsPlus extends PluginBase implements Listener {

	function onEnable() {   
        $this->getServer()->getPluginManager()->registerEvents($this,$this);
    /*Default Messages*/
        $this->getLogger()->info(TextFormat::GREEN."PocketJobsPlusを読み込みました！");
        $this->getLogger()->info(TextFormat::RED."このプラグインはpopke LICENSEに同意した上で使用してください。");
    /*Create Config Files*/
        if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0740, true);
        $this->break = new Config($this->getDataFolder()."break.yml", Config::YAML, 
            array(
                'setting' => array('meta' => false),
                Block::STONE => array('name' => '焼き石', 'meta' => 0, 'amount' => 2 ),
                Block::GRASS => array('name' => '草ブロック', 'meta' => 0, 'amount' => 2 ),
                Block::DIRT => array('name' => '土', 'meta' => 0, 'amount' => 2 ),
                Block::COBBLESTONE => array('name' => '丸石', 'meta' => 0, 'amount' => 10 ),
                Block::PLANK => array('name' => '木材', 'meta' => 0, 'amount' => 10 ),
                Block::SAND => array('name' => '砂', 'meta' => 0, 'amount' => 2 ),
                Block::GRAVEL => array('name' => '砂利', 'meta' => 0, 'amount' => 2 ),
                Block::GOLD_ORE => array('name' => '金鉱石', 'meta' => 0, 'amount' => 30 ),
                Block::IRON_ORE => array('name' => '鉄鉱石', 'meta' => 0, 'amount' => 30 ),
                Block::COAL_ORE => array('name' => '石炭鉱石', 'meta' => 0, 'amount' => 20 ),
                Block::WOOD => array('name' => '原木', 'meta' => 0, 'amount' => 20 ),
                Block::LEAVES => array('name' => '葉ブロック', 'meta' => 0, 'amount' => 2 ),
                Block::LAPIS_ORE => array('name' => 'ラピスラズリ鉱石', 'meta' => 0, 'amount' => 25 ),
                Block::SANDSTONE => array('name' => '砂岩', 'meta' => 0, 'amount' => 10 ),
                Block::DIAMOND_ORE => array('name' =>'ダイヤモンド鉱石', 'meta' => 0, 'amount' => 100 ),
                Block::WHEAT_BLOCK => array('name' => '小麦', 'meta' => 0, 'amount' => 5 ),
                Block::REDSTONE_ORE => array('name' => 'レッドストーン鉱石', 'meta' => 0, 'amount' => 25 ),
                Block::SNOW_BLOCK => array('name' => '雪ブロック', 'meta' => 0, 'amount' => 10 ),
                Block::CLAY_BLOCK => array('name' => '粘土ブロック', 'meta' => 0, 'amount' => 5 ),
                Block::PUMPKIN => array('name' => 'かぼちゃ', 'meta' => 0, 'amount' => 5 ),
                Block::NETHERRACK => array('name' => 'ネザーラック', 'meta' => 0, 'amount' => 2 ),
                Block::SOUL_SAND => array('name' => 'ソウルサンド', 'meta' => 0, 'amount' => 2 ),
                Block::GLOWSTONE => array('name' => 'グロウストーン', 'meta' => 0, 'amount' => 25 ),
                Block::MELON_STEM => array('name' => 'スイカブロック', 'meta' => 0, 'amount' => 2 )
            ));
        $this->break->save();
        $this->place = new Config($this->getDataFolder()."place.yml", Config::YAML, 
            array(
                'setting' => array('meta' => false),
                Block::SAPLING => array('name' => '苗木', 'meta' => 0, 'amount' => 2 ),
                Block::WHEAT_BLOCK => array('name' => '小麦', 'meta' => 0, 'amount' => 2 ),
                Block::SUGARCANE_BLOCK => array('name' => 'さとうきび', 'meta' => 0, 'amount' => 2 )
                ));
         $this->place->save();
    /*PocketMoneyAPI Road*/
        if ($this->getServer()->getPluginManager()->getPlugin("AmberMoney") != null) {
            $this->AmberMoney = $this->getServer()->getPluginManager()->getPlugin("AmberMoney");
        } else {
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
	}

	function onPlayerBlockBreak(BlockBreakEvent $event) {
		$user = $event->getPlayer()->getName();
        $bid = $event->getBlock()->getId();
        $bd = $event->getBlock()->getDamage();
        $cmeta = $this->break->getAll()['setting'];
        if ($this->break->exists($bid)) {
            $breaky = $this->break->getAll()[$bid];
            if ($cmeta = 'ture') {
                if ($bd == $breaky["meta"]) {
                    $this->addMoney($user, $breaky["amount"]);
                }
            } else {
                $this->addMoney($user, $breaky["amount"]);
            }
        }
	}
	
    function onPlayerBlockPlace(BlockPlaceEvent $event) {
        $user = $event->getPlayer()->getName();
        $bid = $event->getBlock()->getId();
        $bd = $event->getBlock()->getDamage();
        $cmeta = $this->place->getAll()['setting'];
        if ($this->place->exists($bid)) {
            $placey = $this->place->getAll()[$bid];
            if ($cmeta = 'ture') {
                if ($bd == $placey["meta"]) {
                    $this->addMoney($user, $placey["amount"]);
                }
            } else {
                $this->addMoney($user, $placey["amount"]);
            }
        }
    }

    function addMoney($user, $amount) {
        $this->AmberMoney->addMoney($user, $amount);
    }

}
