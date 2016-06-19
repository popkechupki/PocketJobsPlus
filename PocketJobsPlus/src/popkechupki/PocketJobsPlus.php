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
    /*EconomyAPI Road*/
    if($this->getServer()->getPluginManager()->getPlugin("EconomyAPI") != null){
            $this->EconomyAPI = $this->getServer()->getPluginManager()->getPlugin("EconomyAPI");
            $this->getLogger()->info("EconomyAPIを検出しました。");
        }else{
            $this->getLogger()->warning("EconomyAPIが見つかりませんでした");
            $this->getServer()->getPluginManager()->disablePlugin($this);
        }
    $this->break->save();
    $this->getServer()->getPluginManager()->registerEvents($this,$this);
	}

	public function onPlayerlockBreak(BlockBreakEvent $event) {
		$user = $event->getPlayer()->getName();
			switch ($event->getBlock()->getId()) {
				case"1":
                    $prize = $this->break->get("焼き石(1)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"2":
                    $prize = $this->break->get("草ブロック(2)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"3":
                    $prize = $this->break->get("土(3)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"4":
                    $prize = $this->break->get("丸石(4)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"5":
                    $prize = $this->break->get("木材(5)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"12":
                    $prize = $this->break->get("砂(12)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"13":
                    $prize = $this->break->get("砂利(13)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"14":
                    $prize = $this->break->get("金鉱石(14)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"15":
                    $prize = $this->break->get("鉄鉱石(15)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"16":
                    $prize = $this->break->get("石炭鉱石(16)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"17":
                    $prize = $this->break->get("原木(17)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"18":
                    $prize = $this->break->get("葉ブロック(18)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"21":
                    $prize = $this->break->get("ラピスラズリ鉱石(21)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"24":
                    $prize = $this->break->get("砂岩(24)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"56":
                    $prize = $this->break->get("ダイアモンド鉱石(56)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"59":
                    $prize = $this->break->get("小麦(59)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"73":
                case"74":
                    $prize = $this->break->get("レッドストーン鉱石(73)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"80":
                    $prize = $this->break->get("雪ブロック(80)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"82":
                    $prize = $this->break->get("粘土(82)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"86":
                    $prize = $this->break->get("かぼちゃ(86)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"87":
                    $prize = $this->break->get("ネザーラック(87)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"88":
                    $prize = $this->break->get("ソウルサンド(88)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"89":
                    $prize = $this->break->get("グロウストーン(89)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
                case"103":
                    $prize = $this->break->get("スイカ(103)");
                    $this->EconomyAPI->addMoney($user, +$prize);
                break;
			}
	}
}