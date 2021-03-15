<?php
namespace App;

class Genre extends CSVColumn
{

    /**
     * Holds the CSV Header name
     * @var string
     */
    public string $header;

    /**
     * Holds the column position
     * @var int
     */
    public int $columnPosition;

    /**
     * Holds the download name
     * @var string
     */
    public string $downloadName;

    /**
     * Holds the data fetched
     * @var array
     */
    public array $data;

    /**
     * Sets the header on CSV File
     * @return $this
     */
    public function setHeader(): Genre
    {
        $this->header = 'genres';

        return $this;
    }

    /**
     * Sets the download name
     * @return $this
     */
    public function setDownloadName(): Genre
    {
        $this->downloadName = 'Data/genres.json';

        return $this;
    }

    /**
     * Sets column position in CSV file
     * @return $this
     */
    public function setColumnPosition(): Genre
    {
        $this->columnPosition = 1;

        return $this;
    }

    /**
     * Extracts data from a stream
     * @param $stream
     * @return array
     */
    public function extractData($stream): array
    {
        $rawData =  $this->fetchData($stream, $this->columnPosition);

        $this->data = $this->formatData($rawData);

        return $this->data;
    }

}