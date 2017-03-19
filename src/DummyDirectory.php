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
class DummyDirectory implements DirectoryInterface
{

    function getParentDirectory() : DirectoryInterface {}

    /**
     * Returns if File/Directory/Link exists
     *
     * @return bool If object exists
     */
    function isExsisting() : bool{}
    function getName() : string {}
    function newChildFile(string $Name) : FileInterface {}
    function newChildDirectory(string $Name) : DirectoryInterface {}
    function isRootDirectory() : bool {}
    function offsetExists($Offset) : bool {}
    function offsetGet($Offset) : FileSystemObjectInterface {}
    function offsetUnset($Offset) {}
    function offsetSet($Offset, $Value) {}
    function getIterator() : Traversable {}

}
