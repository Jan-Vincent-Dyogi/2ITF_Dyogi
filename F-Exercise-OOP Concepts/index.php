<!DOCTYPE html>
<html>
 
<body>

<?php

class nameOfClass
{
    private $string1;
    private $string2;
    private $int1;

    public function setString1($string1)
    {
        $this->string1 = $string1;
        return $this;
    }

    public function getString1()
    {
        return $this->string1;
    }

    public function setstring2($string2)
    {
        $this->string2 = $string2;
        return $this;
    }

    public function getstring2()
    {
        return $this->string2;
    }

    public function setInt1($int1)
    {
        $this->int1 = $int1;
        return $this;
    }

    public function getInt1()
    {
        return $this->int1;
    }

    public function displayInfo()
    {
        echo "string1: " . $this->string1 . "<br>";
        echo "string2: " . $this->string2 . "<br>";
        echo "int1: " . $this->int1 . "<br>";
    }
}

class nameOfChild extends nameOfClass
{
    private  $string3;

    public function setString3($string3)
    {
        $this->string3 = $string3;
        return $this;
    }
    public function getString3()
    {
        return $this->string3;
    }
    public function printInfo($int2)
    {
        echo "int2: " . $int2 . "<br>";
        echo "string3: " . $this->string3 . "<br>";
    }
    public function displayInfo()
    {
        parent::displayInfo();
    }
}
class nameOfGrandchild extends nameOfChild
{
    private $string4;

    public function setString4($string4)
    {
        $this->string4 = $string4;
        return $this;
    }

    public function getString4()
    {
        return $this->string4;
    }

    public function displayInfo()
    {
        echo "string4: " . $this->string4 . "<br>";
    }
}

$obj1 = new nameOfClass();
$obj1->setString1("Hello")->setstring2("World")->setInt1(1);
$obj1->displayInfo();

echo "<br>";
$obj2 = new nameOfChild();
$obj2->setString1("Hello")->setstring2("Universe")->setInt1(2)->setString3("XD");
$obj2->displayInfo();
$obj2->printInfo(3);

echo "<br>";
$obj3 = new nameOfGrandchild(); //didn't display the other strings and ints because it didn't override
$obj3->setString1("Hello")->setstring2("Galaxy")->setInt1(4)->setString3("xD")->setString4("didn't override");
$obj3->displayInfo();

?>
</body>
</html>