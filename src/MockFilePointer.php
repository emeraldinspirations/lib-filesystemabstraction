<?php

/**
 * Container for MockFilePointer
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
 * A pointer to a mock file
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class MockFilePointer implements FilePointerInterface
{
//     public $Contents;
    protected $Path;
    protected $FileSystem;
//
//     /**
//      * Return the parent directory of the file
//      *
//      * @return DirectoryInterface The parent directory
//      */
//     public function getParentDirectory() : DirectoryInterface
//     {
//         return $this->ParentDirectory;
//     }
//
//     /**
//      * Returns if file exists
//      *
//      * In the dummy object, the existance of the file is determined by the
//      * value of the DummyFile::Contents property.  If Null, then the file
//      * doesn't exist.  If not null, then the file exists.
//      *
//      * @return bool If file exists
//      */
//     public function isExsisting() : bool
//     {
//         return ! is_null($this->Contents);
//     }
//
//     /**
//      * Return the contents of the file
//      *
//      * @todo No exceptions yet handled
//      *
//      * @return string Contents of the file
//      */
    public function getContents() : string
    {
        // return $this->Contents;
    }
//
//     /**
//      * Set the contents of the file
//      *
//      * @param string $Data The new contents of the file
//      *
//      * @todo No exceptions yet handled
//      *
//      * @return void
//      */
    public function setContents(string $Data)
    {
        $this->FileSystem->writeToFile($this->Path, $Data);
    }
//
//     /**
//      * Return the name of the file
//      *
//      * @return string File name
//      */
//     public function getName() : string
//     {
//         return $this->Name;
//     }
//
    /**
     * Construct a new MockFilePointer object
     *
     * @param string              $Path       The path of the referenced file
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
