<?php
interface CatInterface
{
    public function meow();
    public function lick();
    public function bite();
}

interface TigerInterface
{
    public function roar();
    public function lick();
    public function bite();
}

class Tabby implements CatInterface
{
    public function meow()
    {
        echo '喵喵~~~~' . PHP_EOL;
    }

    public function lick()
    {
        echo '舔' . PHP_EOL;
    }

    public function bite()
    {
        echo '癢' . PHP_EOL;
    }
}

class SiberianTiger implements TigerInterface
{
    public function roar()
    {
        echo '吼~~~~~' . PHP_EOL;
    }

    public function lick()
    {
        echo '舔獵物' . PHP_EOL;;
    }

    public function bite()
    {
        echo '你已經4了' . PHP_EOL;
    }
}

class TigerAdapter implements CatInterface
{
    protected $Tiger;

    public function setAdapter(TigerInterface $Tiger)
    {
        $this->Tiger = $Tiger;
    }

    public function meow()
    {
        $this->Tiger->roar();
    }

    public function lick()
    {
        $this->Tiger->lick();
    }

    public function bite()
    {
        $this->Tiger->bite();
    }
}

class CatAdapter implements TigerInterface
{
    protected $Cat;

    public function setAdapter(CatInterface $Cat)
    {
        $this->Cat = $Cat;
    }

    public function roar()
    {
        $this->Cat->meow();
    }

    public function lick()
    {
        $this->Cat->lick();
    }

    public function bite()
    {
        $this->Cat->bite();
    }
}

//實例化

//生成西伯利亞虎
$SiberianTiger = new SiberianTiger();

//西伯利亞虎轉接頭
$SiberianTigerAdapter = new TigerAdapter();
$SiberianTigerAdapter->setAdapter($SiberianTiger);

$SiberianTigerAdapter->meow();
$SiberianTigerAdapter->lick();
$SiberianTigerAdapter->bite();


//生成虎斑貓
$Tabby = new Tabby();
//虎斑貓轉接頭
$TabbyAdapter = new CatAdapter();
$TabbyAdapter->setAdapter($Tabby);

$TabbyAdapter->roar();
$TabbyAdapter->lick();
$TabbyAdapter->bite();