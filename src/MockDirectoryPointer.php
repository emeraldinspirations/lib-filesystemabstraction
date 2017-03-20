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

    protected $Name;
    protected $ParentDirectory;

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

    }

    /**
     * Creates directory
     *
     * @return void
     */
    public function createDirectory()
    {
        $this->FileSystem->makeDirectory($this->Path);
    }

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
