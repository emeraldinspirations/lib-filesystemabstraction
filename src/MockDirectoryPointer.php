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

    /**
     * The path of the referenced directory
     *
     * @var string
     */
    protected $Path;

    /**
     * Container for MockFileSystem
     *
     * @var MockFileSystem
     */
    protected $MockFileSystem;

    /**
     * Returns the new path of a child element (directory / file)
     *
     * @param string $ChildName The name of a child element
     *
     * @return string
     */
    protected function getChildPath($ChildName)
    {
        return $this->Path . DIRECTORY_SEPARATOR . $ChildName;
    }

    /**
     * Add a child element (directory / file) to the contents of a directory
     * via reference.
     *
     * @param string $ChildName The name of the child element
     * @param string $ChildPath The path of the child element
     *
     * @return void
     */
    protected function addChildToContents($ChildName, $ChildPath)
    {
        $MockDirectoryContents = & $this->MockFileSystem->getContents();
        $NewChildContents      = & $MockDirectoryContents[$ChildPath];
        $ThisDirectory         = & $MockDirectoryContents[$this->Path];
        $ThisDirectory[MFS::PARAM_CONTENTS][$ChildName] = & $NewChildContents;
    }

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
        $NewPath               = $this->getChildPath($Name);

        $Pointer = new MockFilePointer($NewPath, $this->MockFileSystem);
        $Pointer->setContents('');

        $this->addChildToContents($Name, $NewPath);

        return $Pointer;

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
        $NewPath               = $this->getChildPath($Name);

        $Pointer = new MockDirectoryPointer($NewPath, $this->MockFileSystem);
        $Pointer->createDirectory();

        $this->addChildToContents($Name, $NewPath);

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
     * Returns the path of the referenced directory
     *
     * @return string
     */
    public function getPath() : string
    {
        return $this->Path;
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
