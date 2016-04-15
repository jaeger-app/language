<?php
/**
 * Jaeger
 *
 * @author		Eric Lamb <eric@mithra62.com>
 * @copyright	Copyright (c) 2015-2016, mithra62, Eric Lamb
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./tests/LanguageTest.php
 */
namespace JaegerApp\tests;

use JaegerApp\Language;

/**
 * Jaeger - Language object Unit Tests
 *
 * Contains all the unit tests for the \JaegerApp\Language object
 *
 * @package Jaeger\Tests
 * @author Eric Lamb <eric@mithra62.com>
 */
class LanguageTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Ensures the Language Init() mechanisms work as expected
     */
    public function testLanguageInit()
    {
        $this->assertClassHasAttribute('is_loaded', '\\JaegerApp\\Language');
        $this->assertClassHasAttribute('paths', '\\JaegerApp\\Language');
        $this->assertClassHasAttribute('language', '\\JaegerApp\\Language');
        
        $lang = new Language();
        $this->assertObjectHasAttribute('is_loaded', $lang);
        $this->assertObjectHasAttribute('paths', $lang);
        $this->assertObjectHasAttribute('language', $lang);
        
        $lang->init($this->lang1Path());
        $this->assertEquals($lang->__('test_language_return'), 'testLanguage1String');
    }

    public function testLanguageOverride()
    {
        $lang = new Language();
        $lang->init($this->lang1Path());
        $this->assertEquals($lang->__('test_language_return'), 'testLanguage1String');
        
        $lang->init($this->lang2Path());
        $this->assertEquals($lang->__('test_language_return'), 'testLanguage2String');
        
        $lang->init($this->lang3Path());
        $this->assertEquals($lang->__('test_language_return'), 'testLanguage3String');
        
        $lang->init($this->lang2Path());
        $this->assertEquals($lang->__('test_language_return'), 'testLanguage2String');
    }
}