# Image Map Field

## Introduction

This component is for drawing image map areas/region/hotspot overlays on top
of an image. This is to replicate HTML image map `<map>` and `<area>` so we
use the same terms for this module.

## Getting Started

Add build artifacts (*.js and *.scss) to project's public folder by running
the following command in the project's root folder.

```
    $> composer vendor-expose
```

Add image map field to a page and associate it with an image field.

```php
    <?php
    use ImageMapField\Forms\ImageMapField;
    use ImageMapField\Traits\ProcessMapData;
    
    class TestPage {

        use ProcessMapData;

        private static $db = [
            'ProcessMapData' => 'Text',
        ];

        private static $has_one = [
            'ProcessMapImage' => Image::class,
        ];

        public function getCMSFields()
        {
            $fields = parent::getCMSFields();
            $fields->addFieldToTab(
                'Root.Main',
                ImageMapField::create('ProcessMapData', 'ProcessMapData')
                    ->setImage($this->ProcessMapImage()),
            );
        }

        ...
    }
```

```ss
    ...

    $ImageMapView

    ...
```

## Dependency

    - Npm / yarn
    - Vue.js

## Front-end tooling

To build in _dev_ mode, run the following command in module root:

    $> npm run dev

To build in _prod_ mode, run the following command in module root:

    $> npm run prod

For more details look into `package.json` file.
