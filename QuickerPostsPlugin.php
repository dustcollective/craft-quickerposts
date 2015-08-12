<?php
namespace Craft;

class QuickerPostsPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Quicker Posts');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Dust';
    }

    function getDeveloperUrl()
    {
        return 'http://du.st';
    }

	public function getSourceLanguage()
	{
	    return 'en_GB';
	}
}
