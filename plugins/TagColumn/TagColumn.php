<?php
/**
TagColumn
Copyright 2010, Brian Enigma <brian@netninja.com>, http://netninja.com
$Id: TagColumn.php 147 2010-03-08 21:35:36Z briane $

TagColumn is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

TagColumn is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with MantisBT.  If not, see <http://www.gnu.org/licenses/>.

*/

/**
 * requires columns_api
 */
require_once( 'columns_api.php' );

// Kind of an awkward name because we don't want to conflict with a native Mantis class if they ever add one.
class TagColumnPluginColumn extends MantisColumn
{
    public $title = "Tags";
    public $column = "Tags";
    public $sortable = false;
    public function sortquery( $p_dir ) {}
    // In an ideal world, we'd take the bug IDs and do a single query joining bug IDs to tags, then cache them.
    public function cache( $p_bugs ) {}
    // In an ideal world, we'd use the cache() function, above, instead of lots of calls to tag_bug_get_attached (which hits the database each call)
    public function display( $p_bug, $p_columns_target )
    {
        $tagRows = tag_bug_get_attached($p_bug->id);
        if (sizeof($tagRows) > 0)
        {
            for ($i = 0; $i < sizeof($tagRows); $i++)
            {
                $row = $tagRows[$i];
                print('<a href="tag_view_page.php?tag_id=' . $row['id'] . '" style="font-size:7pt; color:black;">' . $row['name'] . '</a>');
                if ($i < sizeof($tagRows) - 1)
                    print("<br />\n");
            }
        }
    }
}

class TagColumnPlugin extends MantisPlugin 
{
    function register() 
    {
        $this->name        = 'Tag Column';
        $this->description = 'Adds a column within the View Issues screen showing tags';
        $this->version     = '1.0';
        $this->author      = 'Brian Enigma';
        $this->contact     = 'brian@netninja.com';
        $this->url         = 'http://netninja.com';
    }
 
    function init() 
    {
        plugin_event_hook( 'EVENT_FILTER_COLUMNS', 'addColumn' );
    }

    function addColumn()
    {
        return array('TagColumnPluginColumn');
    }
}
?>
