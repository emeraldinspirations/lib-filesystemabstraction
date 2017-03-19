<?php

/**
 * Container for DummyFile
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
 * A dummy file
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class DummyFile implements FileInterface
{
    public $Contents;

    public function getParentDirectory() : FileSystemObjectInterface
    {

    }

    /**
     * Returns if file exists
     *
     * In the dummy object, the existance of the file is determined by the
     * value of the DummyFile::Contents property.  If Null, then the file
     * doesn't exist.  If not null, then the file exists.
     *
     * @return bool If file exists
     */
    public function isExsisting() : bool
    {
        return ! is_null($this->Contents);
    }

    /**
     * Return the contents of the file
     *
     * @todo No exceptions yet handled
     *
     * @return string Contents of the file
     */
    public function getContents() : string
    {
        return $this->Contents;
    }

    /**
     * Set the contents of the file
     *
     * @param string $Data The new contents of the file
     *
     * @todo No exceptions yet handled
     *
     * @return void
     */
    public function setContents(string $Data)
    {
        $this->Contents = $Data;
    }

    public function getName() : string
    {

    }

}
