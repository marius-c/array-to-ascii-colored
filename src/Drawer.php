<?php
abstract class Drawer
{
    /**
     * @var AssocTable
     */
    protected $assocTable;

    /**
     * Horizontal line
     */
    const HLINE    = '-';

    /**
     * Vertical line
     */
    const VLINE    = '|';

    /**
     * Plus sign
     */
    const PLUSSIGN = '+';

    /**
     * Spacing at the start of the string
     */
    const SPACE_S  = 1;

    /**
     * Spacing at the end of the string
     */
    const SPACE_E  = 3;

    /**
     * New line char
     */
    const NLINE    = "\n";

    /**
     * @param AssocTable $assocTable
     */
    public function __construct(AssocTable $assocTable)
    {
        $this->assocTable = $assocTable;
    }

    /**
     * Draws table
     */
    public function draw()
    {
        $this->assocTable->rewind();
        $colNames = $this->assocTable->getColsNames();

        $table  = self::NLINE;
        $table .= $this->drawSeparatorLine();
        $table .= $this->drawLine(array_combine($colNames, $colNames), $colNames);
        $table .= $this->drawSeparatorLine();

        foreach ($this->assocTable as $arrayToDraw) {
            $table .= $this->drawLine($arrayToDraw, $colNames);
        }

        $table .= $this->drawSeparatorLine();

        return $table;
    }

    /**
     * Creates line separator
     *
     * @return string
     */
    public function drawSeparatorLine()
    {
        $line = self::PLUSSIGN;
        $this->assocTable->rewind();
        $keys = array_keys($this->assocTable->current());
        while ($columnName = current($keys))
        {
            $line .= str_repeat("-", self::SPACE_S);
            $line .= str_repeat(self::HLINE, $this->assocTable->getColMaxSize($columnName));
            $line .= str_repeat("-", self::SPACE_E);
            $line .= self::PLUSSIGN;
            next($keys);
        }

        $line .= self::NLINE;

        return $line;
    }

    /**
     * @param array $arrayToDraw
     * @param array $columnNames
     */
    protected abstract function drawLine(array $arrayToDraw, array $columnNames);
}