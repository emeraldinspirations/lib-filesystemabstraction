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

use \emeraldinspirations\library\fileSystemAbstraction\MockFileSystem as MFS;

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

    protected $Name;

    /**
     * Container for MockFileSystem
     *
     * @var MockFileSystem
     */
    protected $MockFileSystem;

    /**
     * Create a file inside directory, return a pointer to that file
     *
     * @param string $Name The name of the file to create
     *
     * @return FilePointerInterface Pointer to the new file
     */
    public function createChildFile(
        string $Name
    ) : FilePointerInterface {

    }

    /**
     * Create a sub-directory inside directory, return a pointer to that
     * directory
     *
     * @param string $Name The name of the directory to create
     *
     * @return DirectoryPointerInterface Pointer to new directory
     */
    public function createChildDirectory(
        string $Name
    ) : DirectoryPointerInterface {
        $NewPath               = $this->Path . DIRECTORY_SEPARATOR . $Name;
        $MockDirectoryContents = & $this->MockFileSystem->getContents();

        $Pointer = new MockDirectoryPointer($NewPath, $this->MockFileSystem);
        $Pointer->createDirectory();

        $NewDirectory          = & $MockDirectoryContents[$NewPath];
        $ThisDirectory         = & $MockDirectoryContents[$this->Path];
        $ThisDirectory[MFS::PARAM_CONTENTS][$Name] = & $NewDirectory;

        return $Pointer;
    }

    /**
     * Creates directory
     *
     * @return void
     */
    public function createDirectory()
    {
        $this->MockFileSystem->makeDirectory($this->Path);
    }

    /**
     * Construct a new MockDirectoryPointer object
     *
     * @param string                  $Path           The path of the referenced
     * directory
     * @param MockFileSystemInterface $MockFileSystem The file system used
     */
    public function __construct(
        string $Path,
        MockFileSystemInterface $MockFileSystem
    ) {
        $this->Path           = $Path;
        $this->MockFileSystem = $MockFileSystem;
    }

}
