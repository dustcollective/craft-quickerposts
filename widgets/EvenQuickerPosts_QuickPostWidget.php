<?php
namespace Craft;

class QuickerPosts_QuickPostWidget extends BaseWidget
{
    public function getName()
    {
        return Craft::t('Quick Create');
    }

    protected function defineSettings()
    {
        return array(
           'sections' => array(AttributeType::String),
        );
    }

    public function getSettingsHtml()
    {
        // Only allow sections the user has permission to create entires in.
        $sections = array();

        foreach (craft()->sections->getAllSections() as $section)
        {
            // Only list channels and structures.
            if ($section->type !== SectionType::Single)
            {
                if (craft()->userSession->checkPermission('createEntries:'.$section->id))
                {
                    $sections[] = $section;
                }
            }
        }

        return craft()->templates->render('quickerposts/settings', array(
            'sections' => $sections,
            'settings' => $this->getSettings()
        ));
    }

    public function getBodyHtml()
    {
        return craft()->templates->render('quickerposts/body', array(
            'settings' => $this->getSettings()
        ));
    }

    public function prepSettings($settings)
    {
        return $settings;
    }
}
