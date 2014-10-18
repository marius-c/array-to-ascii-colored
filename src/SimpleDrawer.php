<?php
class SimpleDrawer extends Drawer
{
    /**
     * Draws text line
     *
     * @param array $arrayToDraw
     * @param array $columnNames
     * @return string
     */
    public function drawLine(array $arrayToDraw, array $columnNames)
    {
        $line = self::VLINE;

        foreach ($columnNames as $value)
        {
            $line .= str_repeat(" ", self::SPACE_S) .
                $arrayToDraw[$value] .
                str_repeat(" ", ($this->assocTable->getColMaxSize($value) - strlen($arrayToDraw[$value]))) .
                str_repeat(" ", self::SPACE_E) .self::VLINE;
            next($columnNames);
        }

        $line .= self::NLINE;

        return $line;
    }
}