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

    protected $Path;
    protected $FileSystem;

    /**
     * Return the contents of the file
     *
     * @return string Contents of the file
     */
    public function getContents() : string
    {
        return $this->FileSystem->readCompleteFile($this->Path);
    }

    /**
     * Set the contents of the file
     *
     * @param string $Data The new contents of the file
     *
     * @return void
     */
    public function setContents(string $Data)
    {
        $this->FileSystem->writeToFile($this->Path, $Data);
    }

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
