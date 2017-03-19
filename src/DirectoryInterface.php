<?php

/**
 * Container for FileSystemObjectInterface
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
 * Most basic I/O object
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
interface DirectoryInterface extends
    FileSystemObjectInterface,
    \IteratorAggregate,
    \ArrayAccess
{

    function newChildFile(string $Name) : FileInterface;
    function newChildDirectory(string $Name) : DirectoryInterface;

    /**
     * Returns if directory is root directory
     *
     * @return bool
     */
    function isRootDirectory() : bool;

    /**
     * Creates directory & parents if not-existing
     *
     * @todo No exceptions yet handled
     *
     * @return void
     */
    function createDirectory();

}
