<?php

/**
 * Container for DummyDirectory unit tests
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
 * Unit tests for DummyDirectory
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class DummyDirectoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Storage for test object
     *
     * @var DummyDirectory
     */
    protected $object;

    /**
     * Run before each test
     *
     * @return void
     */
    protected function setUp()
    {
        $this->object = new DummyDirectory();
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
            DummyDirectory::class,
            $this->object,
            'Fails if wrong class defined'
        );

        $this->assertInstanceOf(
            DirectoryInterface::class,
            $this->object,
            'Fails if class does not implement DirectoryInterface'
        );

        $this->assertInstanceOf(
            FileSystemObjectInterface::class,
            $this->object,
            'Fails if class does not implement FileSystemObjectInterface'
        );

        $this->assertInstanceOf(
            \IteratorAggregate::class,
            $this->object,
            'Fails if class does not implement IteratorAggregate'
        );

        $this->assertInstanceOf(
            \ArrayAccess::class,
            $this->object,
            'Fails if class does not implement ArrayAccess'
        );

    }

}
