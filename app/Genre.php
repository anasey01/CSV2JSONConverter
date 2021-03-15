<?php
namespace App;

class Genre extends CSVColumn
{
    public int $id;

    public string $name;

    public string $header;

    public int $columnPosition;

    public string $downloadName;

    public array $data;


    public function setHeader(): Genre
    {
        $this->header = 'genres';

        return $this;
    }

    public function setDownloadName(): Genre
    {
        $this->downloadName = 'Data/genres.json';

        return $this;
    }

    public function setColumnPosition(): Genre
    {
        $this->columnPosition = 1;

        return $this;
    }

    public function extractData($stream): array
    {
        $rawData =  $this->fetchData($stream, $this->columnPosition);

        $this->data = $this->formatData($rawData);

        return $this->data;
    }

}