<?php

namespace ImageMapField\Traits;

use SilverStripe\View\ArrayData;
use SilverStripe\ORM\ArrayList;
use ImageMapField\Models\Area;

trait ProcessMapDataTrait
{
    public function getImageMapView()
    {
        $data = $this->getImageMapViewableData();

        if ($data) {
            return $data->renderWith(['ImageMapTemplate']);
        }

        return null;
    }

    /**
     * @return ArrayData with 2 props - Image and ImageMapAreas
     */
    public function getImageMapViewableData()
    {
        $data = json_decode($this->ProcessMapData, true);
        $arrayList = ArrayList::create();

        if (is_array($data)) {
            foreach ($data as $value) {
                $arrayList->push(Area::create($value));
            }
        }

        $arrayData = ArrayData::create([
            'Image'             => $this->ProcessMapImage(),
            'ImageMapAreas'     => $arrayList,
            'ProcessMapCaption' => $this->ProcessMapCaption,
        ]);

        return $arrayData;
    }
}
