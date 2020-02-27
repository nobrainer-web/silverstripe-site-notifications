<?php

namespace Dynamic\Notifications\Extension;

use DNADesign\Elemental\Forms\TextCheckboxGroupField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class ContentDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $db = [
        'Title' => 'Varchar(255)',
        'ShowTitle' => 'Boolean',
        'Content' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $searchable_fields = [
        'Title' => [
            'title' => 'Title',
        ],
        'Content' => [
            'title' => 'Content'
        ]
    ];

    /**
     * @var bool
     */
    private static $versioned_gridfield_extensions = true;

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        // Add a combined field for "Title" and "Displayed" checkbox in a Bootstrap input group
        $fields->removeByName('ShowTitle');
        $fields->replaceField(
            'Title',
            TextCheckboxGroupField::create()
                ->setName('Title')
        );

        $fields->dataFieldByName('Content')
            ->setRows(5);
    }
}
