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
     * Storage for directory's name
     *
     * @var string
     */
    protected $DirectoryName;

    /**
     * Storage for directory's parent directory
     *
     * @var DirectoryInterface
     */
    protected $ParentDirectory;

    /**
     * Run before each test
     *
     * @return void
     */
    protected function setUp()
    {
        $this->DirectoryName = microtime();
        $this->ParentDirectory = new DummyDirectory(microtime());

        $this->object = new DummyDirectory(
            $this->DirectoryName,
            $this->ParentDirectory
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

    /**
     * Verifies the file name is passed through the constructor and returned
     * via getName
     *
     * @return null
     */
    public function testGetName()
    {

        $this->assertEquals(
            $this->DirectoryName,
            $this->object->getName(),
            'Fails if function not defined, value not retained, or value not'
            . ' returned'
        );

    }


    /**
    * Verifies the parent directory is passed through the constructor and
    * returned via getParentDirectory
    *
    * @return null
     */
    public function testGetParentDirectory()
    {

        $this->assertSame(
            $this->ParentDirectory,
            $this->object->getParentDirectory(),
            'Fails if function not defined, value not retained, or value not'
            . ' returned'
        );

    }

    /**
     * Verifies directory can be root
     *
     * @return void
     */
    public function testIsRootDirectory()
    {

        $this->assertFalse(
            $this->object->isRootDirectory(),
            'Fails if function not defined, or not returning a value'
        );

        $this->assertTrue(
            $this->object->getParentDirectory()->isRootDirectory(),
            'Fails if function always returns false'
        );

    }

    /**
    * Verifies directory's existance is based on contents of
    * DummyDirectory::Contents
    *
    * If DummyFile::Contents is null, then the directory doesn't exist
    * If DummyFile::Contents isnot null, then the directory exists
    *
    * In the file system this would be replaced with a function to verify the
    * current existance of a directory.
    *
    * @return void
     */
    public function testIsExisting()
    {

        $this->assertFalse(
            $this->object->isExsisting(),
            'Fails if function returns null'
        );

        $this->object->Contents = [];

        $this->assertTrue(
            $this->object->isExsisting(),
            'Fails if function returns false regardless of existance'
        );

    }

    /**
     * Verifies that createDirectory creates an empty directory, and creates
     * all parent directorties as needed.
     *
     * @return void
     */
    public function testCreateDirectory()
    {
        $Dir[1] = new DummyDirectory('Dir1');
        $Dir[2] = new DummyDirectory('Dir2', $Dir[1]);
        $Dir[3] = new DummyDirectory('Dir3', $Dir[2]);
        $Dir[4] = new DummyDirectory('Dir4', $Dir[3]);

        foreach ($Dir as $DirA) {
            $this->assertFalse($DirA->isExsisting());
        }

        $Dir[4]->createDirectory();

        foreach ($Dir as $DirA) {
            $this->assertTrue($DirA->isExsisting());
        }

        $this->assertEquals(
            [
                $Dir[1]->Contents['Dir2']->getName(),
                $Dir[2]->Contents['Dir3']->getName(),
                $Dir[3]->Contents['Dir4']->getName(),
            ],
            [
                'Dir2',
                'Dir3',
                'Dir4',
            ]
        );

        $this->assertEquals(
            count($Dir[1]->Contents)
            + count($Dir[2]->Contents)
            + count($Dir[3]->Contents)
            + count($Dir[4]->Contents),
            3
        );

    }

}

/**
 * Mock FileInterface
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class DummyDirectoryTest_MockFile implements FileInterface
{

    /**
     * Mock getParentDirectory
     *
     * @return DirectoryInterface
     */
    public function getParentDirectory() : DirectoryInterface
    {

    }

    /**
     * Mock isExsisting
     *
     * @return bool
     */
    public function isExsisting() : bool
    {

    }

    /**
     * Mock getContents
     *
     * @return string
     */
    public function getContents() : string
    {

    }

    /**
     * Mock setContents
     *
     * @param string $Data MockParam
     *
     * @return void
     */
    public function setContents(string $Data)
    {

    }

    /**
     * Mock getName
     *
     * @return string
     */
    public function getName() : string
    {

    }

}
