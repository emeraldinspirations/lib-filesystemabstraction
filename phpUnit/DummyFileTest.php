<?php

/**
 * Container for DummyFile unit tests
 *
 * PHP Version 7
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */

namespace emeraldinspirations\library\fileSystemAbstraction;

/**
 * Unit tests for DummyFile
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class DummyFileTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Storage for test object
     *
     * @var DummyFile
     */
    protected $object;

    /**
     * Run before each test
     *
     * @return void
     */
    protected function setUp()
    {
        $this->object = new DummyFile();
    }

    /**
     * Verifies object constructs, inherits and implements correctly
     *
     * @return void
     */
    public function testConstruct()
    {
        //Fails if class doesn't exist

        $this->assertInstanceOf(
            DummyFile::class,
            $this->object,
            'Fails if wrong class defined'
        );

        $this->assertInstanceOf(
            FileInterface::class,
            $this->object,
            'Fails if class does not implement FileInterface'
        );

        $this->assertInstanceOf(
            FileSystemObjectInterface::class,
            $this->object,
            'Fails if class does not implement FileSystemObjectInterface'
        );

    }

    /**
     * Verifies dummy file has data that can be set
     *
     * @return void
     */
    public function testSetContents()
    {
        $this->object->Contents = microtime();
        // Fails if DummyFile::Contents does not exist

        $NewContents = microtime().'NewContents';

        $this->object->setContents($NewContents);

        $this->assertEquals(
            $NewContents,
            $this->object->Contents,
            'Fails if contents not set'
        );

    }

    /**
     * Verifies dummy file has data that can be read
     *
     * @return void
     */
    public function testGetContents()
    {
        $this->object->Contents = microtime();
        // Fails if DummyFile::Contents does not exist

        $this->assertEquals(
            $this->object->Contents,
            $this->object->getContents(),
            'Fails if contents not retrieved'
        );

    }

}
