<?php
namespace App;

class Keyword extends CSVColumn
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
    public function setHeader(): Keyword
    {
        $this->header = 'keywords';

        return $this;
    }

    /**
     * Sets column position in CSV file
     * @return $this
     */
    public function setColumnPosition(): Keyword
    {
        $this->columnPosition = 4;

        return $this;
    }

    /**
     * Sets the download name
     * @return $this
     */
    public function setDownloadName(): Keyword
    {
        $this->downloadName = 'Data/keywords.json';

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
