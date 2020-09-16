<?php

/**
 * MicroUSB接口
 */
interface MicroUSBInterface
{
    public function transferDataWithMicroUSB();
    public function chargePowerWithMicroUSB();
}

/**
 * TypeC接口
 */
interface TypeCInterface
{
    public function transferDataWithTypeC();
    public function chargePowerWithTypeC();
}

class MicroUSB implements MicroUSBInterface
{
    public function transferDataWithMicroUSB()
    {
        return '正在使用MicroUSB傳送資料';
    }

    public function chargePowerWithMicroUSB()
    {
        return '正在使用MicroUSB充電';
    }
}

class TypeC implements TypeCInterface
{
    public function transferDataWithTypeC()
    {
        return '正在使用TypeC傳送資料';
    }

    public function chargePowerWithTypeC()
    {
        return '正在使用TypeC充電';
    }
}

/**
 * 基於TypeC的傳輸協定
 */
class Thunderbolt3 implements TypeCInterface
{
    public function transferDataWithTypeC()
    {
        return '正在使用Thunderbolt3傳送資料';
    }

    public function chargePowerWithTypeC()
    {
        return '正在使用Thunderbolt3充電';
    }
}

/**
 * 基於TypeC的傳輸協定
 */
class USB4 implements TypeCInterface
{
    public function transferDataWithTypeC()
    {
        return '正在使用USB4傳送資料';
    }

    public function chargePowerWithTypeC()
    {
        return '正在使用USB4充電';
    }
}

/**
 * MicroUSB轉TypeC的轉接頭
 */
class MicroUSBAdapter implements MicroUSBInterface
{
    private $TypeC;

    public function __construct(TypeCInterface $TypeC)
    {
        $this->TypeC = $TypeC;
    }

    public function transferDataWithMicroUSB()
    {
        return $this->TypeC->transferDataWithTypeC();
    }

    public function chargePowerWithMicroUSB()
    {
        return $this->TypeC->chargePowerWithTypeC();
    }

}

/**
 * 使用裝置(筆電|手機|平板etc)
 */
class Device
{
    private $connecter;

    public function setConnecter(MicroUSBInterface $connecter)
    {
        $this->connecter = $connecter;
        return $this;
    }

    public function transferData()
    {
        echo $this->connecter->transferDataWithMicroUSB() . PHP_EOL;
    }

    public function chargePower()
    {
        echo $this->connecter->chargePowerWithMicroUSB() . PHP_EOL;
    }
}

// 使用自身的接口
(new Device())->setConnecter(new MicroUSB)->transferData();
(new Device())->setConnecter(new MicroUSB)->chargePower();

// 透過轉接頭處理
(new Device())->setConnecter(new MicroUSBAdapter(new TypeC))->transferData();
(new Device())->setConnecter(new MicroUSBAdapter(new TypeC))->chargePower();

// 透過轉接頭處理
(new Device())->setConnecter(new MicroUSBAdapter(new Thunderbolt3))->transferData();
(new Device())->setConnecter(new MicroUSBAdapter(new Thunderbolt3))->chargePower();