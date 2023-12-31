<?php

namespace Tests\Unit;

use Tests\Helper\SpecialNumber;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // public function setUp(): void
    // {
    //     parent::setUp();
    // }
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }

    /**
     * A basic test example.
     */
    public function test_that_false_is_false(): void
    {
        $this->assertFalse(false);
    }

    /**
     * A basic test example.
     */
    public function test_on_string(): void
    {
        $this->assertStringMatchesFormat('%a %i', 'abc 1');
        $this->assertMatchesRegularExpression('/foo/', 'foo');
        $this->assertNull(null);
        $this->assertStringStartsWith('fo', 'foo');
        $this->assertStringEndsWith('o', 'foo');
        $this->assertStringContainsString('bar', 'foobar');
        $this->assertStringContainsStringIgnoringCase('foo', 'FOOBAR');
    }

    /**
     * A basic test example.
     */
    public function test_for_same_value_and_type(): void
    {
        $this->assertSame('12', '12');  // // compares with ===

        $a = ['a' => ['abc', 'efg']];
        $b = ['a' => ['abc', 'efg']];

        $this->assertSame($a, $b);
    }

    /**
     * A basic test example.
     */
    public function test_for_same_value(): void
    {
        $this->assertEquals('12', 12);   // compares with ==

        $a = ['a' => ['abc', 'efg']];
        $b = ['a' => ['abc', 'efg']];

        $this->assertEquals($a, $b);

    }

    /**
     * A basic test example.
     */
    public function test_for_same_value_ignoring_case(): void
    {
        $this->assertEqualsIgnoringCase('abc', 'ABC');   // compares with ==

        $a = ['a' => ['Abc', 'efG']];
        $b = ['a' => ['abC', 'efg']];

        $this->assertEqualsIgnoringCase($a, $b);
    }

    /**
     * A basic test example.
     */
    public function test_for_same_value_ignoring_delta(): void
    {
        $this->assertEqualsWithDelta(1.0, 1.5, 0.5);  // allows delta variation in 3rd param
    }

    /**
     * A basic test example.
     */
    // public function test_for_value_object(): void
    // {

    //     $a = new SpecialNumber(7);
    //     $b = new SpecialNumber(2);

    //     $this->assertObjectEquals($a, $b);
    // }

    /**
     * A basic test example.
     */
    public function test_for_file_content(): void
    {
        $a = base_path('storage/app/test.txt');
        $b = base_path('storage/app/test_2.txt');

        $this->assertFileEquals($a, $b);
        $this->assertFileMatchesFormat('Sample text', $a);
        $this->assertFileMatchesFormatFile($a, $b);
        $this->assertStringEqualsFile($a, "Sample text\n");
        $this->assertStringEqualsFileIgnoringCase($a, "sample text\n");
    }

    /**
     * A basic test example.
     */
    public function test_for_array_has(): void
    {
        $a = ['key_1' => 'abc', 'key_2' => 'efg'];
        $b = ['val_1', 2, 'val_3'];

        $this->assertIsArray($a);
        $this->assertArrayHasKey('key_1', $a);
        $this->assertArrayNotHasKey('key_3', $a);
        $this->assertContains(2, $b);
        $this->assertContains('abc', $a);
        $this->assertNotContains('b', $a);
        $this->assertIsList([0 => 'foo', 1 => 'ooo', 2 => 'bar']); // must have consecutive key values
    }

    /**
     * A basic test example.
     */
    public function test_for_array_type_check(): void
    {
        $a = ['key_1' => 'abc', 'key_2' => 'efg'];
        $b = ['val_1', 2, 'val_3'];

        $this->assertContainsOnly('string', $a);
        // $this->assertContainsOnly('string', $b);
        // $this->assertContainsOnlyInstancesOf();
        // $this->assertObjectHasProperty('propertyName', new stdClass);
    }

    /**
     * A basic test example.
     */
    public function test_for_array_count(): void
    {
        $a = ['key_1' => 'abc', 'key_2' => 'efg'];
        $b = ['val_1', 2];

        $this->assertCount(2, $a);
        $this->assertSameSize($a, $b);
        $this->assertEmpty([]);
    }

    /**
     * A basic test example.
     */
    public function test_for_comparing_numbers(): void
    {
        $this->assertGreaterThanOrEqual(1, 2);
        $this->assertGreaterThan(1, 2);
        $this->assertLessThan(2, 1);
        $this->assertLessThanOrEqual(2, 1);
    }

    /**
     * A basic test example.
     */
    public function test_for_json_values(): void
    {
        $a = base_path('storage/app/test_3.json');
        $b = base_path('storage/app/test_4.json');

        $this->assertJson('{"a":"b"}');
        $this->assertJsonFileEqualsJsonFile($a, $b);
        $this->assertJsonStringEqualsJsonString('{"a":"b"}', '{"a":"b"}');
    }

    /**
     * A basic test example.
     */
    public function test_for_xml_values(): void
    {
        $a = base_path('storage/app/test_5.xml');
        $b = base_path('storage/app/test_6.xml');

        $this->assertXmlFileEqualsXmlFile($a, $b);
        $this->assertXmlStringEqualsXmlString('<abc></abc>', '<abc></abc>');
        $this->assertXmlStringEqualsXmlFile($a, '<abc></abc>');
    }

    /**
     * A basic test example.
     */
    public function test_for_files_and_directories(): void
    {
        $dir = storage_path('app');
        $a = base_path('storage/app/test.txt');
        $b = base_path('storage/app/test_6.xml');

        $this->assertDirectoryExists($dir);
        $this->assertDirectoryIsReadable($dir);
        $this->assertDirectoryIsReadable($dir);
        $this->assertFileExists($a);
        $this->assertFileIsReadable($b);
        $this->assertFileIsWritable($b);
    }

    /**
     * A basic test example.
     */
    public function test_for_datatypes(): void
    {
        $this->assertIsArray([]);
        $this->assertIsBool(true);
        $this->assertIsFloat(1.2);
        $this->assertIsInt(2);
        $this->assertIsNumeric(5);
        $this->assertIsObject(new \stdClass);
        $this->assertIsString('abc');
        $this->assertNull(null);
        $this->assertNan(NAN);
    }
}
