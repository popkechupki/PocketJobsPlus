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

class PocketJobsPlus extends PluginBase implements Listener {

	public function onEnable() {                                    
    $this->getLogger()->info(TextFormat::GREEN."PocketJobsPlusを読み込みました".TextFormat::GOLD." By popkechupki");
    $this->getLogger()->info(TextFormat::RED."このプラグインはpopke LICENSEに同意した上で使用してください。");
    if (!file_exists($this->getDataFolder())) @mkdir($this->getDataFolder(), 0741, true);
        $this->break = new Config($this->getDataFolder() . "break.yml", Config::YAML,
                    array(
                        '焼き石(1)'=>'2', '草ブロック(2)'=>'2', '土(3)'=>'2', '丸石(4)'=>'10', '木材(5)'=>'10', '砂(12)'=>'2', '砂利(13)'=>'2', '金鉱石(14)'=>'30', '鉄鉱石(15)'=>'30', '石炭鉱石(16)'=>'20', '原木(17)'=>'20', '葉ブロック(18)'=>'2', 'ラピスラズリ鉱石(21)'=>'25', '砂岩(24)'=>'10', 'ダイアモンド鉱石(56)'=>'100', '小麦(59)'=>'5', 'レッドストーン鉱石(73)'=>'25', '雪ブロック(80)'=>'10', '粘土(82)'=>'2', 'かぼちゃ(86)'=>'5', 'ネザーラック(87)'=>'2', 'ソウルサンド(88)'=>'2', 'グロウストーン(89)'=>'25', 'スイカ(103)'=>'2'
                        ));
    /*PocketMoneyAPI Road*/
    if($this->getServer()->getPluginManager()->getPlugin("PocketMoney") != null){
            $this->PocketMoney = $this->getServer()->getPluginManager()->getPlugin("PocketMoney");
            $this->getLogger()->info("PocketMoneyを検出しました。");
        }else{
            $this->getLogger()->warning("PocketMoneyが見つかりませんでした");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    $this->break->save();
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
	}

	public function onPlayerlockBreak(BlockBreakEvent $event) {
		$user = $event->getPlayer()->getName();
			switch ($event->getBlock()->getId()) {
				case"1":
                    $price = $this->break->get("焼き石(1)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"2":
                    $price = $this->break->get("草ブロック(2)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"3":
                    $price = $this->break->get("土(3)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"4":
                    $price = $this->break->get("丸石(4)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"5":
                    $price = $this->break->get("木材(5)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"12":
                    $price = $this->break->get("砂(12)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"13":
                    $price = $this->break->get("砂利(13)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"14":
                    $price = $this->break->get("金鉱石(14)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"15":
                    $price = $this->break->get("鉄鉱石(15)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"16":
                    $price = $this->break->get("石炭鉱石(16)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"17":
                    $price = $this->break->get("原木(17)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"18":
                    $price = $this->break->get("葉ブロック(18)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"21":
                    $price = $this->break->get("ラピスラズリ鉱石(21)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"24":
                    $price = $this->break->get("砂岩(24)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"56":
                    $price = $this->break->get("ダイアモンド鉱石(56)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"59":
                    $price = $this->break->get("小麦(59)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"73":
                case"74":
                    $price = $this->break->get("レッドストーン鉱石(73)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"80":
                    $price = $this->break->get("雪ブロック(80)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"82":
                    $price = $this->break->get("粘土(82)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"86":
                    $price = $this->break->get("かぼちゃ(86)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"87":
                    $price = $this->break->get("ネザーラック(87)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"88":
                    $price = $this->break->get("ソウルサンド(88)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"89":
                    $price = $this->break->get("グロウストーン(89)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
                case"103":
                    $price = $this->break->get("スイカ(103)");
                    $this->PocketMoney->grantMoney($user, +$price);
                break;
			}
	}
}