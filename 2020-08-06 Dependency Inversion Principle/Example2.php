<?php
abstract class Game
{
    //成就達成數
    protected $achievement_count = 0;
}

interface GameInterface
{
    // 安裝
    public function installed();
    // 執行程序
    public function execute();
    // 讀取資料
    public function load();
    // 紀錄資料
    public function record();
    // 解除安裝
    public function uninstalled();
}

class FF7Remake extends Game implements GameInterface
{
    public function installed()
    {

    }

    public function execute()
    {

    }

    public function load()
    {

    }

    public function record()
    {

    }

    public function uninstalled()
    {

    }
}

class Persona5 extends Game implements GameInterface
{
    public function installed()
    {

    }

    public function execute()
    {

    }

    public function load()
    {

    }

    public function record()
    {

    }

    public function uninstalled()
    {

    }
}

class PS4
{
    private $game;

    /**
     * [installGame 安裝遊戲]
     * @param  GameInterface $game [description]
     * @return [type]              [description]
     */
    public function installGame(GameInterface $game)
    {
        $this->game = $game;
    }

    /**
     * [playGame 開始遊戲]
     * @return [type] [description]
     */
    public function playGame()
    {
        $this->game->execute();
    }

    /**
     * [uninstallGame 移除遊戲]
     * @return [type] [description]
     */
    public function uninstallGame()
    {
        $this->game->uninstalled();
    }

    /**
     * [loadGame 讀檔]
     * @return [type] [description]
     */
    public function loadGame()
    {
        $this->game->load();
    }

    /**
     * [saveGame 存檔]
     * @return [type] [description]
     */
    public function saveGame()
    {
        $this->game->record();
    }


}


$PS4 = new PS4();

$FF7Remake = new FF7Remake();
$PS4->installGame($FF7Remake);
$PS4->playGame();
$PS4->saveGame();
$PS4->loadGame();

$Persona5 = new Persona5();
$PS4->installGame($Persona5);
$PS4->playGame();
$PS4->saveGame();
$PS4->loadGame();
$PS4->uninstallGame();