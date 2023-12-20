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

    /**
     * A basic test example.
     */
    public function test_get_api_json_response_response(): void
    {

        $this->get(route('test-api', ["name" => "name1"]))->assertStatus(422);
        $json_content = $this->get('/api/test-api?name=name1')->decodeResponseJson()->json;
        $data = json_decode($json_content, true);
        $this->assertSame("E001", $data["errorCode"]);
        $this->assertSame("name1", $data["name"]);
    }

    /**
     * A basic test example.
     */
    public function test_post_api_json_response_response(): void
    {
        $this->post(route('test-api', ["name" => "name1"]))->assertStatus(200);
        $json_content = $this->post('/api/test-api', ["name" => "name1"])->decodeResponseJson()->json;
        $data = json_decode($json_content, true);
        $this->assertSame("0000", $data["errorCode"]);
        $this->assertSame("name1", $data["name"]);
    }

    /**
     * A basic test example.
     */
    public function test_put_api_json_response_response(): void
    {
        $this->put(route('test-api', ["name" => "name1"]))->assertStatus(200);
        $json_content = $this->put('/api/test-api', ["name" => "name1"])->decodeResponseJson()->json;
        $data = json_decode($json_content, true);
        $this->assertSame("0001", $data["errorCode"]);
        $this->assertSame("name1", $data["name"]);
    }

    /**
     * A basic test example.
     */
    public function test_patch_api_json_response_response(): void
    {
        $this->patch(route('test-api', ["name" => "name1"]))->assertStatus(200);
        $json_content = $this->patch('/api/test-api', ["name" => "name1"])->decodeResponseJson()->json;
        $data = json_decode($json_content, true);
        $this->assertSame("0002", $data["errorCode"]);
        $this->assertSame("name1", $data["name"]);
    }

    /**
     * A basic test example.
     */
    public function test_delete_api_json_response_response(): void
    {
        $this->delete(route('test-api', ["name" => "name1"]))->assertStatus(200);
        $json_content = $this->delete('/api/test-api', ["name" => "name1"])->decodeResponseJson()->json;
        $data = json_decode($json_content, true);
        $this->assertSame("0003", $data["errorCode"]);
        $this->assertSame("name1", $data["name"]);
    }
}
