<?php

namespace ImageMapField\Forms;

use SilverStripe\Forms\TreeDropdownField;

/**
 * Used in Image Map vue component for the selecting internal page id and title
 * for image map areas but there's no db field associated with this field.
 */
class DatalessTreeDropdownField extends TreeDropdownField
{

    /**
     * @return Boolean
     */
    public function hasData()
    {
        return false;
    }
}
