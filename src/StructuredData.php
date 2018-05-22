<?php

namespace Agencms\StructuredData;

use Agencms\Core\Field;
use Agencms\Core\Group;

class StructuredData
{
    /**
     * Returns the Agencms repeater configuration for Structured Data blocks
     *
     * @param string $key
     * @return Group
     */
    public function repeater(string $key = 'structured_data')
    {
        return Group::full('Structured Data')
            ->repeater($key)
            ->addGroup(
                Group::full('Person')
                    ->key('structureddata.person')
                    ->addField(
                        Field::string('name', 'Name'),
                        Field::string('jobTitle', 'Job Title'),
                        Field::string('telephone', 'Telephone'),
                        Field::string('url', 'Website URL'),
                        Field::string('email', 'Email Address'),
                        Field::date('birthDate', 'Birth Date'),
                        Field::string('streetAddress', 'Street Address'),
                        Field::string('addressLocality', 'City'),
                        Field::string('addressRegion', 'County'),
                        Field::string('postalCode', 'Post Code'),
                        Field::string('addressCountry', 'Country'),
                        Field::select('sameAs', 'Social Network URLs')->tags()
                    ),
                Group::full('Organization')
                    ->key('structureddata.organization')
                    ->addField(
                        Field::string('name', 'Name'),
                        Field::string('url', 'Website URL'),
                        Field::select('contactType', 'Contact Point')
                            ->dropdown()->single()->addOptions([
                                'Customer service'
                            ]),
                        Field::string('telephone', 'Contact Telephone'),
                        Field::string('email', 'Contact Email'),
                        Field::string('streetAddress', 'Street Address'),
                        Field::string('addressLocality', 'City'),
                        Field::string('addressRegion', 'County'),
                        Field::string('postalCode', 'Post Code'),
                        Field::string('addressCountry', 'Country'),
                        Field::select('sameAs', 'Social Network URLs')->tags()
                    )
            );
    }
}
