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
interface FileInterface extends
    FileSystemObjectInterface
{

    /**
     * Return the contents of the file
     *
     * @todo No exceptions yet handled
     *
     * @return string Contents of the file
     */
    function getContents() : string;

    /**
     * Set the contents of the file
     *
     * @param string $Data The new contents of the file
     *
     * @todo No exceptions yet handled
     *
     * @return void
     */
    function setContents(string $Data);

}
