<?php

/**
 * Container for DummyDirectory
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
 * A dummy directory
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class MockDirectoryPointer implements DirectoryPointerInterface
{

    public $Contents;
    protected $Name;
    protected $ParentDirectory;

    function createChildFile(string $Name) : FilePointerInterface {}
    function createChildDirectory(string $Name) : DirectoryPointerInterface {}

    //
    // /**
    //  * Return the parent directory of the directory
    //  *
    //  * @return DirectoryInterface The parent directory
    //  */
    // public function getParentDirectory() : DirectoryInterface
    // {
    //     return $this->ParentDirectory;
    // }
    //
    // /**
    //  * Returns if directory exists
    //  *
    //  * @return bool If object exists
    //  */
    // function isExsisting() : bool
    // {
    //     return ! is_null($this->Contents);
    // }
    //
    // function newChildFile(string $Name) : FileInterface {}
    // function newChildDirectory(string $Name) : DirectoryInterface {}
    // function offsetExists($Offset) : bool {}
    // function offsetGet($Offset) : FileSystemObjectInterface {}
    // function offsetUnset($Offset) {}
    // function offsetSet($Offset, $Value) {}
    // function getIterator() : Traversable {}
    //
    // /**
    //  * Creates directory & parents if not-existing
    //  *
    //  * @return void
    //  */
    public function createDirectory()
    {
    //     if (!$this->isRootDirectory()) {
    //         $this->getParentDirectory()->createDirectory();
    //         $this->getParentDirectory()->Contents[$this->Name] = $this;
    //     }
    //
    //     $this->Contents = [];
    //
    }
    //
    // /**
    //  * Return the name of the directory
    //  *
    //  * @return string File name
    //  */
    // public function getName() : string
    // {
    //     return $this->Name;
    // }
    //
    // /**
    //  * Returns if directory is root directory
    //  *
    //  * @return bool
    //  */
    // function isRootDirectory() : bool
    // {
    //     return is_null($this->ParentDirectory);
    // }

    /**
     * Construct a new MockDirectoryPointer object
     *
     * @param string              $Path       The path of the referenced
     *                                        directory
     * @param FileSystemInterface $FileSystem The file system used
     */
    public function __construct(
        string $Path,
        FileSystemInterface $FileSystem
    ) {
        $this->Path       = $Path;
        $this->FileSystem = $FileSystem;
    }

}
