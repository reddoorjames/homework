<?php
abstract class GirlFriend
{
    protected $favorability = 0;

    public function showFavorability()
    {
        return $this->favorability;
    }
}

interface GirlFriendInterface
{
    public function kissed();
    public function date();
    public function sex();
    public function break();
}

class Any extends GirlFriend implements GirlFriendInterface
{
    public function kissed()
    {
        $this->favorability = mt_rand(-10, 10);
    }
    public function date()
    {
        $this->favorability = mt_rand(-10, 10);
    }

    public function sex()
    {
        $this->favorability = 999;
    }

    public function break()
    {
        $this->favorability = 0;
    }
}


class Linda extends GirlFriend implements GirlFriendInterface
{
    public function kissed()
    {
        $this->favorability = mt_rand(-20, 10);
    }

    public function date()
    {
        $this->favorability = mt_rand(10, 20);
    }

    public function sex()
    {
        $this->favorability = 999;
    }

    public function break()
    {
        $this->favorability = 0;
    }
}

class Grace extends GirlFriend implements GirlFriendInterface
{
    public function kissed()
    {
        $this->favorability += 0;
    }

    public function date()
    {
        $this->favorability += 0;
    }

    public function sex()
    {
        $this->favorability += 0;
    }

    public function break()
    {
        $this->favorability = 0;
    }
}

class Boy
{
    private $name;
    private $girlfriend;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function seeing(GirlFriendInterface $girlfriend)
    {
        $this->girlfriend = $girlfriend;
    }

    public function kiss()
    {
        $this->girlfriend->kissed();
    }

    public function inviteDate()
    {
        $this->girlfriend->date();
    }

    public function bookingRoom()
    {
        $this->girlfriend->sex();
    }

    public function breakup()
    {
        $this->girlfriend->break();
    }

    public function survey()
    {
        echo $this->girlfriend->showFavorability() . PHP_EOL;
    }
}

$Protagonist = new Boy();

$Any = new Any();
$Protagonist->seeing($Any);
$Protagonist->bookingRoom();
$Protagonist->bookingRoom();
$Protagonist->bookingRoom();
$Protagonist->bookingRoom();
$Protagonist->bookingRoom();
$Protagonist->survey();
$Protagonist->breakup();


$Linda = new Linda();
$Protagonist->seeing($Linda);
$Protagonist->inviteDate();
$Protagonist->inviteDate();
$Protagonist->kiss();
$Protagonist->kiss();
$Protagonist->survey();
$Protagonist->bookingRoom();
$Protagonist->breakup();

$Grace = new Grace();
$Protagonist->seeing($Grace);
$Protagonist->inviteDate();
$Protagonist->survey();
$Protagonist->breakup();