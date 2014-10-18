<?php
class ColoredDrawer extends Drawer
{
    /**
     * Draws text line using colors with the help of ansicon
     *
     * @param array $arrayToDraw
     * @param array $columnNames
     * @return string
     */
    public function drawLine(array $arrayToDraw, array $columnNames)
    {
        $line = self::VLINE;

        foreach ($columnNames as $k => $value)
        {
            $line .=  Color::open($k) .
                    str_repeat(" ", self::SPACE_S) .
                    $arrayToDraw[$value] .
                    str_repeat(" ", ($this->assocTable->getColMaxSize($value) - strlen($arrayToDraw[$value]))) .
                    str_repeat(" ", self::SPACE_E) .
                    Color::close().
                    self::VLINE;
            next($columnNames);
        }

        $line .= self::NLINE;

        return $line;
    }
}