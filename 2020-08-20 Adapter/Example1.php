<?php

/**
 * 習大大行為
 */
interface XiJinpingBehavior
{
    public function eat();
    public function walk();
    public function talk();
}

/**
 * 小熊維尼行為
 */
interface PoohBearBehavior
{
    public function eat();
    public function crawl();
    public function growl();
}

/**
 * 小熊維尼物件
 */
class PoohBear implements PoohBearBehavior
{
    public function eat()
    {
        echo '舔蜂蜜' . PHP_EOL;
    }

    public function crawl()
    {
        echo '爬行' . PHP_EOL;
    }

    public function growl()
    {
        echo '咆哮' . PHP_EOL;
    }
}

/**
 * 習大大物件
 */
class XiJinping implements XiJinpingBehavior
{
    public function eat()
    {
        echo '吃蜂蜜' . PHP_EOL;
    }

    public function walk()
    {
        echo '走路' . PHP_EOL;;
    }

    public function talk()
    {
        echo '說話' . PHP_EOL;;
    }
}

/**
 * 習大大轉接頭
 * 習大大要去cosplay小熊維尼
 */
class XiJinpingAdapter implements PoohBearBehavior
{
    protected $XiJinping;

    public function __construct(XiJinpingBehavior $XiJinping)
    {
        $this->XiJinping = $XiJinping;
    }

    public function eat()
    {
        $this->XiJinping->eat();
    }

    public function crawl()
    {
        $this->XiJinping->walk();
    }

    public function growl()
    {
        $this->XiJinping->talk();
    }
}

//實例化

//生成習大大
$XiJinping = new XiJinping();

//習大大cosplay小熊維尼->習維尼
$XiWinnie = new XiJinpingAdapter($XiJinping);

//習維尼吃蜂蜜
$XiWinnie->eat();

//習維尼走路
$XiWinnie->crawl();

//習維尼說話
$XiWinnie->growl();