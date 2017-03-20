<?php

/**
 * Container for MockFilePointer unit tests
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

use \emeraldinspirations\library\fileSystemAbstraction\MockFileSystem as MFS;

/**
 * Unit tests for MockFilePointer
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class MockFilePointerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Storage for test object
     *
     * @var MockFilePointer
     */
    protected $object;

    /**
     * Storage for path
     *
     * @var string
     */
    protected $Path;

    /**
     * Storage for file system
     *
     * @var FileSystemInterface
     */
    protected $FileSystem;

    /**
     * Run before each test
     *
     * @return void
     */
    protected function setUp()
    {
        $this->Path = microtime();

        $this->FileSystem = new MockFileSystem();
        $this->FileSystem->Contents[$this->Path] = [
            MFS::PARAM_TYPE=>MFS::TYPE_FILE,
            MFS::PARAM_CONTENTS=>microtime().'OldContents'
        ];

        $this->object = new MockFilePointer(
            $this->Path,
            $this->FileSystem
        );


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
            MockFilePointer::class,
            $this->object,
            'Fails if wrong class defined'
        );

        $this->assertInstanceOf(
            FilePointerInterface::class,
            $this->object,
            'Fails if class does not implement FilePointerInterface'
        );

    }

    /**
     * Verifies dummy file has data that can be set
     *
     * @return void
     */
    public function testSetContents()
    {

        $NewContents = microtime().'NewContents';

        $this->object->setContents($NewContents);

        $this->assertEquals(
            $NewContents,
            $this->FileSystem->Contents[$this->Path][MFS::PARAM_CONTENTS],
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

        $this->assertEquals(
            $this->FileSystem->Contents[$this->Path][MFS::PARAM_CONTENTS],
            $this->object->getContents(),
            'Fails if contents not retrieved'
        );

    }

}
