<?php
interface PetInterface
{
    public function attack();
    public function name();
    public function levelup();
}

interface MonsterInterface
{
    public function attack();
    public function injured();
    public function defeated();
}

abstract class Pet{
    protected $name = '寵物名';
    protected $level    = 1;
    protected $str      = 1;
    protected $hp       = 100000;
}

abstract class Monster{
    protected $name     = '怪物名';
    protected $str      = 1;
    protected $hp       = 100000;
}

class GoblinMonster extends Monster implements MonsterInterface
{
    public function attack()
    {
        echo '造成傷害' . $this->str . '點' . PHP_EOL;
    }

    public function injured()
    {
        $this->hp--;
        echo '受到玩家攻擊' . PHP_EOL;
    }

    public function defeated()
    {
        $this->hp = 0;
        echo 'HP歸零，怪物被擊倒' . PHP_EOL;
    }
}

class GoblinPet extends Pet implements PetInterface
{
    public function attack()
    {
        echo '造成傷害' . $this->level * $this->str  . '點' . PHP_EOL;
    }

    public function name()
    {
        echo '取名字' . PHP_EOL;
    }

    public function levelup()
    {
        $this->level++;
        echo '升級為 ' . $this->level;
    }
}

class PetAdapter implements MonsterInterface
{
    protected $Pet;

    public function setAdapter(PetInterface $Pet)
    {
        $this->Pet = $Pet;
    }

    public function attack()
    {
        $this->Pet->attack();
    }

    public function injured()
    {
        // 寵物不會受傷
    }

    public function defeated()
    {
        // 寵物不會被擊倒
    }
}

class MonsterAdapter implements PetInterface
{
    protected $Monster;

    public function setAdapter(MonsterInterface $Monster)
    {
        $this->Monster = $Monster;
    }

    public function attack()
    {
        $this->Monster->attack();
    }

    public function name()
    {
        //怪物不須取名字
    }

    public function levelup()
    {
        //怪物沒有升級概念
    }
}

//實例化

//先生成怪物哥布林
$GoblinMonster = new GoblinMonster();

//哥布琳受到玩家攻擊
$GoblinMonster->injured();
//哥布琳被擊敗
$GoblinMonster->defeated();

//開始收服
//產生怪物哥布林轉接頭
$GoblinMonsterAdapter = new MonsterAdapter();
$GoblinMonsterAdapter->setAdapter($GoblinMonster);

//寵物哥布琳攻擊其他怪物
$GoblinMonsterAdapter->attack();


// 放生寵物哥布林,轉換為怪物
$GoblinPet = new GoblinPet();

$GoblinPetAdapter = new PetAdapter();
$GoblinPetAdapter->setAdapter($GoblinPet);
//怪物哥布琳攻擊玩家
$GoblinPetAdapter->attack();
//怪物哥布林受傷
$GoblinPetAdapter->injured();