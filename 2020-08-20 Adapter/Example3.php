<?php
interface LogisticsCompany
{
    public function transport();
    public function getShipStatus();
    public function calculateShippingFee();
}

/**
 * 黑貓
 */
class TCatAdapter implements LogisticsCompany
{
    public function transport()
    {
        echo '申請寄送';
    }

    public function getShipStatus()
    {
        echo '揀貨中';
    }

    public function calculateShippingFee()
    {
        // 省略計算規則
        return 120;
    }
}

/**
 * Uber
 */
class UberAdapter implements LogisticsCompany
{
    public function transport()
    {
        echo '申請寄送';
    }

    public function getShipStatus()
    {
        echo '已送達';
    }

    public function calculateShippingFee()
    {
        // 省略計算規則
        return 80;
    }
}

/**
 * 四大超商
 */
class CVSAdapter implements LogisticsCompany
{
    public function transport()
    {
        echo '申請寄送';
    }

    public function getShipStatus()
    {
        echo '已出貨';
    }

    public function calculateShippingFee()
    {
        // 省略計算規則
        return 60;
    }
}

class LogisticsService
{

    private $LogisticsCompany;

    public function __construct()
    {
        $LogisticsCompany = config('app.logistics');
        $this->LogisticsCompany = new $LogisticsCompany;
    }

    public function transport()
    {
        $this->LogisticsCompany->transport();
    }

    public function getShipStatus($path)
    {
        $this->LogisticsCompany->getShipStatus();
    }

    public function calculateShippingFee($file_path)
    {
        $this->LogisticsCompany->calculateShippingFee($file_path);
    }
}

// 沒實例