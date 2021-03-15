<?php


namespace App;


class Reader
{
    /**
     *  Holds the stream for a Column Class
     * @var $stream
     */
    public $stream;

    /**
     * Keeps the generated record to be converted
     * @var array $record
     */
    public array $record;

    /**
     * The Column Class to extract from
     * @var CSVColumn $classToExtract
     */
    public CSVColumn $classToExtract;

    public function __construct(CSVColumn $classColumn)
    {
        $this->classToExtract = $classColumn;
    }

    /**
     * Creates a stream for the CSV file
     * @param string $path
     * @return $this
     */
    public function createFromPath(string $path): Reader
    {
        $this->stream = fopen($path, 'r');

        return $this;
    }

    /**
     * Gets the records for the Column Class
     * @return $this
     */
    public function getRecords(): Reader
    {
        $this->record = $this->classToExtract
                        ->setHeader()
                        ->setColumnPosition()
                        ->setDownloadName()
                        ->extractData($this->stream);

        return $this;
    }

    /**
     * Converts the record to JSON
     * @return bool
     */
    public function convertCSVRecordToJson(): bool
    {
        $filePath = $this->classToExtract->downloadName;
        $headerName = $this->classToExtract->header;
        file_put_contents($filePath, json_encode($this->classToExtract->data));

        print_r("$headerName File extracted and saved in path - $filePath \n");
        unset($this->classToExtract);
        return true;
    }

}