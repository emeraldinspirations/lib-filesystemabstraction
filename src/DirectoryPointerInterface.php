<?php

/**
 * Container for DirectoryPointerInterface
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
 * Pointer to a directory in a file system
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
interface DirectoryPointerInterface
{

    /**
     * Create a file inside directory, return a pointer to that file
     *
     * @param string $Name The name of the file to create
     *
     * @return FilePointerInterface Pointer to the new file
     */
    function createChildFile(string $Name) : FilePointerInterface;

    /**
     * Create a sub-directory inside directory, return a pointer to that
     * directory
     *
     * @param string $Name The name of the directory to create
     *
     * @return DirectoryPointerInterface Pointer to new directory
     */
    function createChildDirectory(string $Name) : DirectoryPointerInterface;

    /**
     * Creates directory & parents if not-existing
     *
     * @todo No exceptions yet handled
     *
     * @return void
     */
    function createDirectory();

}
