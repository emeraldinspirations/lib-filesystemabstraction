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
        $this->FileSystem->Contents[$this->Path] = [
            MFS::PARAM_TYPE=>MFS::TYPE_FILE,
            MFS::PARAM_CONTENTS=>microtime().'OldContents'
        ];

        $NewContents = microtime().'NewContents';

        $this->object->setContents($NewContents);

        $this->assertEquals(
            $NewContents,
            $this->FileSystem->Contents[$this->Path][MFS::PARAM_CONTENTS],
            'Fails if contents not set'
        );

    }
    //
    // /**
    //  * Verifies dummy file has data that can be read
    //  *
    //  * @return void
    //  */
    // public function testGetContents()
    // {
    //     $this->object->Contents = microtime();
    //     // Fails if DummyFile::Contents does not exist
    //
    //     $this->assertEquals(
    //         $this->object->Contents,
    //         $this->object->getContents(),
    //         'Fails if contents not retrieved'
    //     );
    //
    // }
    //
    // /**
    //  * Verifies file's existance is based on contents of DummyFile::Contents
    //  *
    //  * If DummyFile::Contents is null, then the file doesn't exist
    //  * If DummyFile::Contents isnot null, then the file exists
    //  *
    //  * In the file system this would be replaced with a function to verify the
    //  * current existance of a file.
    //  *
    //  * @return void
    //  */
    // public function testIsExisting()
    // {
    //
    //     $this->assertFalse(
    //         $this->object->isExsisting(),
    //         'Fails if function returns null'
    //     );
    //
    //     $this->object->Contents = microtime();
    //
    //     $this->assertTrue(
    //         $this->object->isExsisting(),
    //         'Fails if function returns false regardless of existance'
    //     );
    //
    // }
    //
    // /**
    //  * Verifies the file name is passed through the constructor and returned
    //  * via getName
    //  *
    //  * @return null
    //  */
    // public function testGetName()
    // {
    //
    //     $this->assertEquals(
    //         $this->FileName,
    //         $this->object->getName(),
    //         'Fails if function not defined, value not retained, or value not'
    //         . ' returned'
    //     );
    //
    // }
    //
    // /**
    // * Verifies the parent directory is passed through the constructor and
    // * returned via getParentDirectory
    // *
    // * @return null
    //  */
    // public function testGetParentDirectory()
    // {
    //
    //     $this->assertSame(
    //         $this->ParentDirectory,
    //         $this->object->getParentDirectory(),
    //         'Fails if function not defined, value not retained, or value not'
    //         . ' returned'
    //     );
    //
    // }

}
//
// /**
//  * Mock DirectoryInterface
//  *
//  * @category  Library
//  * @package   Lib-filesystemabstraction
//  * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
//  * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
//  * @license   TBD ../LICENSE.md
//  * @version   GIT: $Id$ In Development.
//  * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
//  */
// class DummyFileTest_MockDirectory implements DirectoryInterface
// {
//
//     /**
//      * Mock getParentDirectory
//      *
//      * @return DirectoryInterface
//      */
//     public function getParentDirectory() : DirectoryInterface
//     {
//
//     }
//
//     /**
//      * Mock isExsisting
//      *
//      * @return bool
//      */
//     public function isExsisting() : bool
//     {
//
//     }
//
//     /**
//      * Mock getName
//      *
//      * @return string
//      */
//     public function getName() : string
//     {
//
//     }
//
//     /**
//      * Mock newChildFile
//      *
//      * @param string $Name MockParam
//      *
//      * @return FileInterface
//      */
//     function newChildFile(string $Name) : FileInterface
//     {
//
//     }
//
//     /**
//      * Mock newChildDirectory
//      *
//      * @param string $Name MockParam
//      *
//      * @return DirectoryInterface
//      */
//     public function newChildDirectory(string $Name) : DirectoryInterface
//     {
//
//     }
//
//     /**
//      * Mock isRootDirectory
//      *
//      * @return bool
//      */
//     public function isRootDirectory() : bool
//     {
//
//     }
//
//     /**
//      * Mock offsetExists
//      *
//      * @param mixed $Offset MockParam
//      *
//      * @return bool
//      */
//     public function offsetExists($Offset) : bool
//     {
//
//     }
//
//     /**
//      * Mock offsetGet
//      *
//      * @param mixed $Offset MockParam
//      *
//      * @return FileSystemObjectInterface
//      */
//     public function offsetGet($Offset) : FileSystemObjectInterface
//     {
//
//     }
//
//     /**
//      * Mock offsetUnset
//      *
//      * @param mixed $Offset MockParam
//      *
//      * @return void
//      */
//     public function offsetUnset($Offset)
//     {
//
//     }
//
//     /**
//      * Mock offsetSet
//      *
//      * @param mixed $Offset MockParam
//      * @param mixed $Value  MockParam
//      *
//      * @return void
//      */
//     public function offsetSet($Offset, $Value)
//     {
//
//     }
//
//     /**
//      * Mock getIterator
//      *
//      * @return Traversable
//      */
//     public function getIterator() : \Traversable
//     {
//
//     }
//
//     /**
//      * Mock createDirectory
//      *
//      * @return void
//      */
//     public function createDirectory()
//     {
//
//     }
//
// }
