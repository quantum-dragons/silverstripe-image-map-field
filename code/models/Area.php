<?php
namespace ImageMapField\Models;

use SilverStripe\View\ViewableData;
use Page;

class Area extends ViewableData
{
    /**
     * @var string
     */
    public $ID;

    /**
     * @var float
     */
    public $X = 0;

    /**
     * @var float
     */
    public $Y = 0;

    /**
     * @var float
     */
    public $Width = 0;

    /**
     * @var float
     */
    public $Height = 0;

    /**
     * @var boolean
     */
    public $UseInternalPage = true;

    /**
     * @var string
     */
    public $ExternalUrl;

    /**
     * @var string
     */
    public $InternalPageID;

    /**
     * @var string
     */
    public $Shape;

    /**
     * @param Array $data  See `ImageMapper.createNewAreaData()` method
     * in `ImageMapper.vue` component for object structure
     */
    public function __construct($data)
    {
        $this->ID = $data['id'];
        $this->X = $data['x'];
        $this->Y = $data['y'];
        $this->Width = $data['width'];
        $this->Height = $data['height'];
        $this->UseInternalPage = $data['useInternalPage'];
        $this->InternalPageID = $data['internalPageId'];
        $this->ExternalUrl = $data['externalUrl'];
        $this->Shape = $data['shape'];
    }

    /**
     * @return string
     */
    public function getDisplayUrl()
    {
        if ($this->UseInternalPage) {
            $page = Page::get()->find('ID', $this->InternalPageID);
            if ($page) {
                return $page->Link();
            } else {
                return null;
            }
        } else {
            return $this->ExternalUrl;
        }
    }
}
