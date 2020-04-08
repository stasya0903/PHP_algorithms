<?php


namespace App;

class ExplorerController extends \RecursiveDirectoryIterator
{
    public $directoryToShow = "";


    public function __construct($path, $flags = \FilesystemIterator::KEY_AS_PATHNAME | \FilesystemIterator::CURRENT_AS_FILEINFO)
    {
        parent::__construct($path, $flags);
        $this->createDirectoryHtml();
    }

    public function getDirectoryHtml()
    {
        return $this->directoryToShow;

    }

    protected function createDirectoryHtml()
    {
        $this->directoryToShow = $this->addDirectoryName($this->getRealPath());

        while ($this->valid()) {

            if ($this->isDot()) {
                $this->directoryToShow .= $this->addHomeLink();
                $this->next();
            }

            if ($this->getBasename() == "..") {
                $this->directoryToShow .= $this->addParentDirLink($this->getPathname());
                $this->next();
            }

            if ($this->isDir()) {
                $this->directoryToShow .= $this->addDirectoryLink($this->getPathname(), $this->getBasename());
                $this->next();
            }
            if ($this->isFile()) {
                $this->directoryToShow .= $this->addFileName($this->getBasename());
                $this->next();
            }
        }
    }

    protected function addHomeLink()
    {
        return "<a href='?path=./'>" . "Root" . PHP_EOL . "</a></br>";
    }

    protected function addParentDirLink($directory)
    {
        return "<a href='?path=./" . $directory . "'>" . "Parent Directory" . PHP_EOL . "</a></br>";
    }

    protected function addDirectoryLink($path, $name)
    {
        return "<a href='?path=" . $path . "'>" . $name . PHP_EOL . "</a></br>";
    }

    protected function addFileName($name)
    {
        return $name . PHP_EOL . "</br>";
    }

    private function addDirectoryName(string $getRealPath)
    {
        return "<h3>" . $getRealPath . "</h3 ></br>";
    }

}