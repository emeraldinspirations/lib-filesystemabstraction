<?php

/**
 * Container for MockDirectoryPointer unit tests
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
 * Unit tests for MockDirectoryPointer
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class MockDirectoryPointerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Storage for test object
     *
     * @var MockDirectoryPointer
     */
    protected $object;

    /**
     * Storage for directory's path
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

        $this->object = new MockDirectoryPointer(
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
            MockDirectoryPointer::class,
            $this->object,
            'Fails if wrong class defined'
        );

        $this->assertInstanceOf(
            DirectoryPointerInterface::class,
            $this->object,
            'Fails if class does not implement DirectoryPointerInterface'
        );

    }

    /**
     * Verifies that createDirectory creates an empty directory
     *
     * @return void
     */
    public function testCreateDirectory()
    {
        $this->object->createDirectory();

        $this->assertEquals(
            [
                MFS::PARAM_TYPE     => MFS::TYPE_DIRECTORY,
                MFS::PARAM_CONTENTS => [],
            ],
            $this->FileSystem->Contents[$this->Path],
            'Fails when directory not created'
        );

    }

    /**
     * Verifies that path is retained and returned on getPath
     *
     * @return void
     */
    public function testGetPath()
    {

        $this->assertEquals(
            $this->Path,
            $this->object->getPath(),
            'Fails if function not defined, or returns wrong value'
        );

    }

    /**
     * Verifies that createChildDirectory creates an empty directory
     *
     * @return void
     */
    public function testCreateChildDirectory()
    {
        $this->object->createDirectory();
        $ChildName = microtime();
        $ChildPath = $this->Path . DIRECTORY_SEPARATOR . $ChildName;
        $Pointer = $this->object->createChildDirectory($ChildName);
        $DirectoryData = [
            MFS::PARAM_TYPE     => MFS::TYPE_DIRECTORY,
            MFS::PARAM_CONTENTS => [],
        ];

        $this->assertEquals(
            $DirectoryData,
            $this->FileSystem->Contents[$ChildPath],
            'Fails when directory not created'
        );

        $this->assertEquals(
            $DirectoryData,
            $this->FileSystem->Contents[$this->Path]
                [MFS::PARAM_CONTENTS][$ChildName],
            'Fails when directory not created'
        );



    }

}
