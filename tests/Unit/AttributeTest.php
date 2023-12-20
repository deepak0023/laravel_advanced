<?php
use Tests\Helper\SpecialNumber;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\TestDox;
use App\Models\User;
use Exception;

class AttributeTest extends TestCase
{

    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = new User();
    }

    #[Test]
    #[DataProvider('additionProvider')]
    #[TestDox('Adding $a to $b results in $expected')]
    #[TestWithJson('[0, 0, 0]')]
    public function Add(int $expected, int $a, int $b)
    {
        $this->assertSame($expected, $a + $b);
    }

    public static function additionProvider()
    {
        return [
            'data set 1' => [0, 0, 0],
            'data set 2' => [2, 1, 1],
            'data set 3' => [1, 0, 1],
            'data set 4' => [4, 1, 3]
        ];
    }

    /**
     * @test
     *
     * @return void
     */
    public function add_numbers() {

        // dd("test");

        $num1 = 1;
        $num2 = 2;
        $total = User::addNumbers($num1, $num2);
        $this->assertSame($total, 3);

        $name = $this->user->getName("name1");
        $this->assertSame("name1", $name);

        $this->expectException(Exception::class);
        $name = $this->user->getName(12);
        $this->assertSame("name1", $name);
    }
}
