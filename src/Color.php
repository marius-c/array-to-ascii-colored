<?php
class Color
{
    /**
     * @var array
     */
    private static $colors = array(0 => "[41m",
                                  1 => "[42m",
                                  3 => "[44m",
                                  2 => "[45m");

    /**
     * Open color string
     * @param $column
     * @return string
     */
    public static function open($column)
    {
        if (!isset(static::$colors[$column]))
            throw new InvalidArgumentException("Column $column does not have a color defined.");

        return chr(27) . static::$colors[$column];
    }

    /**
     * Close color string
     * @return string
     */
    public static function close()
    {
        return chr(27) . "[0m";
    }
}