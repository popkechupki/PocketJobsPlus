<?php

namespace popkechupki;

//server
use pocketmine\Server;

//player
use pocketmine\Player;

//plugin
use pocketmine\plugin\PluginBase;

//event
use pocketmine\event\Listener;
use pocketmine\event\block\BlockBreakEvent;

//another
use pocketmine\utils\TextFormat;
use pocketmine\utils\Config;

class base extends PluginBase implements Listener {

	public function onEnable() {
	$plugin = "PocketJobsPlus";                                        
    $this->getLogger()->info(TextFormat::GREEN.$plugin."を読み込みました".TextFormat::GOLD." By popkechupki");
    $this->getLogger()->info(TextFormat::RED."このプラグインはpopke LICENSEに同意した上で使用してください。");
    if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0740, true);
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '焼き石(1)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '草ブロック(2)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '土(3)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '丸石(4)'=>'10'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '木材(5)'=>'10'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '砂(12)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '砂利(13)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '金鉱石(14)'=>'30'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '鉄鉱石(15)'=>'30'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '石炭鉱石(16)'=>'20'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '原木(17)'=>'20'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '葉ブロック(18)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'ラピスラズリ鉱石(21)'=>'25'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '砂岩(24)'=>'10'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'ダイアモンド鉱石(56)'=>'100'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '小麦(59)'=>'5'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'レッドストーン鉱石(73)'=>'25'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '雪ブロック(80)'=>'10'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        '粘土(82)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'かぼちゃ(86)'=>'5'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'ネザーラック(87)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'ソウルサンド(88)'=>'2'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'グロウストーン(89)'=>'25'
                        ));
        $this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML,
                    array(
                        'スイカ(103)'=>'2'
                        ));
    /*PocketMoneyAPI Road*/
    if($this->getServer()->getPluginManager()->getPlugin("PocketMoney") != null){
            $this->PocketMoney = $this->getServer()->getPluginManager()->getPlugin("PocketMoney");
            $this->getLogger()->info("PocketMoneyを検出しました。");
        }else{
            $this->getLogger()->warning("PocketMoneyが見つかりませんでした");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    $this->config->save();
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
	}

	public function onPlayerlockBreak(BlockBreakEvent $event) {
		$player = $event->getPlayer();
			switch ($event->getBlock()->getId()) {
				case"1":
					$user = $player -> getName();
                    $price = $this->config->get("焼き石(1)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"2":
                    $user = $player -> getName();
                    $price = $this->config->get("草ブロック(2)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"3":
                    $user = $player -> getName();
                    $price = $this->config->get("土(3)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"4":
                    $user = $player -> getName();
                    $price = $this->config->get("丸石(4)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"5":
                    $user = $player -> getName();
                    $price = $this->config->get("木材(5)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"12":
                    $user = $player -> getName();
                    $price = $this->config->get("砂(12)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"13":
                    $user = $player -> getName();
                    $price = $this->config->get("砂利(13)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"14":
                    $user = $player -> getName();
                    $price = $this->config->get("金鉱石(14)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"15":
                    $user = $player -> getName();
                    $price = $this->config->get("鉄鉱石(15)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"16":
                    $user = $player -> getName();
                    $price = $this->config->get("石炭鉱石(16)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"17":
                    $user = $player -> getName();
                    $price = $this->config->get("原木(17)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"18":
                    $user = $player -> getName();
                    $price = $this->config->get("葉ブロック(18)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"21":
                    $user = $player -> getName();
                    $price = $this->config->get("ラピスラズリ鉱石(21)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"24":
                    $user = $player -> getName();
                    $price = $this->config->get("砂岩(24)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"56":
                    $user = $player -> getName();
                    $price = $this->config->get("ダイアモンド鉱石(56)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"59":
                    $user = $player -> getName();
                    $price = $this->config->get("小麦(59)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"73":
                case"74":
                    $user = $player -> getName();
                    $price = $this->config->get("レッドストーン鉱石(73)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"80":
                    $user = $player -> getName();
                    $price = $this->config->get("雪ブロック(80)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"82":
                    $user = $player -> getName();
                    $price = $this->config->get("粘土(82)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"86":
                    $user = $player -> getName();
                    $price = $this->config->get("かぼちゃ(86)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"87":
                    $user = $player -> getName();
                    $price = $this->config->get("ネザーラック(87)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"88":
                    $user = $player -> getName();
                    $price = $this->config->get("ソウルサンド(88)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"89":
                    $user = $player -> getName();
                    $price = $this->config->get("グロウストーン(89)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"103":
                    $user = $player -> getName();
                    $price = $this->config->get("スイカ(103)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
			}
	}
}