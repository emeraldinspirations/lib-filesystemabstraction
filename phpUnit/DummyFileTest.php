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



}
