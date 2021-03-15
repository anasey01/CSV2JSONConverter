<?php


namespace App;


abstract Class CSVColumn
{

    /**
     * Methods for ColumnClasses to implement
     * @param $stream
     * @return mixed
     */
    abstract public function extractData($stream): mixed;

    /**
     * Fetches data from the stream
     * @param $stream
     * @param $colPosition
     * @return array
     */
    public function fetchData($stream, $colPosition): array
    {
        $csvRawData = array();
        while (($data = fgetcsv($stream)) !== FALSE) {
            for ($col= $colPosition; $col < $colPosition + 1; $col++) {
                $csvRawData[] = $data[$col];
            }
        }

        return $csvRawData;
    }

    /**
     * Formats fetched data
     * @param array $rawData
     * @return array
     */
    public function formatData(array $rawData): array
    {
        $total = count($rawData);
        $uniqueDataSet = array();
        for ($counter = 1; $counter < $total; $counter++) {
            $actualData = json_decode($rawData[$counter]);
            if (is_array($actualData)) {
                $innerTotal = count($actualData);
                for ($j = 0; $j < $innerTotal; $j++) {
                    if(!in_array($actualData[$j], $uniqueDataSet)) {
                        $uniqueDataSet[] = $actualData[$j];
                    }
                }
            }

        }

        return $uniqueDataSet;
    }
}