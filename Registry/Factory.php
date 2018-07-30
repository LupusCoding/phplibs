<?php
namespace LC\Registry;

/**
 * Class Factory
 * @package LC\Registry
 * @author Ralph Dittrich <dittrich.ralph@lupuscoding.de>
 * @license <http://creativecommons.org/licenses/by-sa/4.0/> Attribution-ShareAlike 4.0 International
 */
class Factory
{
    /**
     * @return \LC\Registry\Core\Standard
     */
    public function standard()
    {
        return \LC\Registry\Core\Standard::init();
    }

    /**
     * @return \LC\Registry\Core\Scoped
     */
    public function scoped()
    {
        return \LC\Registry\Core\Scoped::init();
    }

    /**
     * @return \LC\Registry\Core\Mini
     */
    public function mini()
    {
        return \LC\Registry\Core\Mini::init();
    }
}