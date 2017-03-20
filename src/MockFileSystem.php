<?php

/**
 * Container for MockFileSystem
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
 * A simulated file system
 *
 * @category  Library
 * @package   Lib-filesystemabstraction
 * @author    Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @copyright 2017 Matthew "Juniper" Barlett <emeraldinspirations@gmail.com>
 * @license   TBD ../LICENSE.md
 * @version   GIT: $Id$ In Development.
 * @link      https://github.com/emeraldinspirations/lib-filesystemabstraction
 */
class MockFileSystem implements FileSystemInterface
{
    const PARAM_TYPE     = 'Type';
    const PARAM_CONTENTS = 'Contents';

    const TYPE_FILE      = 'File';
    const TYPE_DIRECTORY = 'Directory';

    public $Contents = [];


    /**
     * Write data to a specified file
     *
     * @param string $Path The path to the file to be written
     * @param string $Data The data to write to the file
     *
     * @TODO No errors yet supported
     *
     * @return void
     */
    public function writeToFile(string $Path, string $Data)
    {
        $this->Contents[$Path] = [
            self::PARAM_TYPE     => self::TYPE_FILE,
            self::PARAM_CONTENTS => $Data
        ];
    }


    /**
     * Return all the data from a specified file
     *
     * @param string $Path The path to the file to be read
     *
     * @TODO No errors yet supported
     *
     * @return string The contents of the file
     */
    public function readCompleteFile(string $Path) : string
    {
        return $this->Contents[$Path][self::PARAM_CONTENTS];
    }

}
