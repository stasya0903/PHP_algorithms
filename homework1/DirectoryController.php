<?php


namespace App;

use DirectoryIterator;

class DirectoryController extends \RecursiveDirectoryIterator
{

    public function showDirectory()
    {
        $directoryToShow = "<h3>" . $this->getRealPath() . "</h3 ></br>";
        while ($this->valid()) {

            if ($this->isDot())
            {
                $directoryToShow .= "<a href='?path=./'>" . "Root" . PHP_EOL . "</a></br>";
                $this->next();
            }

            if ($this->getBasename() == "..") {

                $directoryToShow .= "<a href='?path=./" . $this->getPathname() . "'>" . "Parent Directory" . PHP_EOL . "</a></br>";
                $this->next();
            }

            if ($this->getPath() == "./..") {

                $this->next();

            }
            if ($this->isDir()) {

                $directoryToShow .= "<a href='?path=" . $this->getPathname() . "'>" . $this->getBasename() . PHP_EOL . "</a></br>";
                $this->next();
            }
            if ($this->isFile()) {
                $directoryToShow .= $this->getBasename() . PHP_EOL . "</br>";
                $this->next();
            }


        }

        return $directoryToShow;

    }


}