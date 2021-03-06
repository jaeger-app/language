<?php
/**
 * Jaeger
 *
 * @copyright	Copyright (c) 2015-2016, mithra62
 * @link		http://jaeger-app.com
 * @version		1.0
 * @filesource 	./Language.php
 */
namespace JaegerApp;

use JaegerApp\Traits\Log;

/**
 * Jaeger - Language Handler Object
 *
 * Provides basic and generic string replacement via loaded php arrays ONLY.
 *
 * Shouldn't be used for anything more than keeping generic phrasing out of the code
 *
 * @package Language
 * @author Eric Lamb <eric@mithra62.com>
 */
class Language
{
    use Log;

    /**
     * Container of the loaded language files
     * 
     * @var array
     */
    private $is_loaded = array();

    /**
     * Container for the various languages
     * 
     * @var unknown
     */
    private $language = array();

    /**
     * Sets up the Language object
     * 
     * @param array $paths            
     */
    public function __construct($paths = array())
    {
        if (! is_array($paths)) {
            $paths = array(
                $paths
            );
        }
        
        foreach($paths As $path) {
            $this->init($path);
        };
    }

    /**
     * Loads a language array file for use
     * 
     * @param string $path
     *            The path to the language direcotry to load
     * @return void|unknown|boolean
     */
    public function init($path)
    {
        if (in_array($path, $this->is_loaded, TRUE)) {
            return;
        }
        
        $lang = array();
        if (is_dir($path)) {
            $d = dir($path);
            while (false !== ($entry = $d->read())) {
                if (! in_array($entry, array(
                    '.',
                    '..'
                ))) {
                    $file = $path . '/' . $entry;
                    $lang = include ($file);
                    
                    $this->is_loaded[] = $file;
                    
                    if (! $lang) {
                        $this->logWarning('Language file contains no data: ' . $file);
                    }
                    
                    $this->language = array_merge($this->language, $lang);
                }
            }
        }
        
        unset($lang);
        return TRUE;
    }

    /**
     * Fetch a single line of text from the language array
     *
     * @param string $line
     *            line
     * @return string
     */
    public function __($line = '')
    {
        $line = ($line == '' or ! isset($this->language[$line])) ? $line : $this->language[$line];
        return $line;
    }
}