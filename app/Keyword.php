<?php
namespace App;

class Keyword extends CSVColumn
{
    public int $id;

    public string $name;

    public string $header;

    public int $columnPosition;

    public string $downloadName;

    public array $data;


    public function setHeader(): Keyword
    {
        $this->header = 'keywords';

        return $this;
    }

    public function setColumnPosition(): Keyword
    {
        $this->columnPosition = 4;

        return $this;
    }

    public function setDownloadName(): Keyword
    {
        $this->downloadName = 'Data/keywords.json';

        return $this;
    }

    public function extractData($stream): array
    {
        $rawData =  $this->fetchData($stream, $this->columnPosition);

        $this->data = $this->formatData($rawData);

        return $this->data;
    }

}
