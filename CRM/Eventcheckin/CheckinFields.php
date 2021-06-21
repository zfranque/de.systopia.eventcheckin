<?php
/*-------------------------------------------------------+
| SYSTOPIA Event Checkin                                 |
| Copyright (C) 2021 SYSTOPIA                            |
| Author: B. Endres (endres@systopia.de)                 |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/

use CRM_Eventcheckin_ExtensionUtil as E;

/**
 * This class captures the various fields that can be displayed upon checkin
 *
 * the options here are currently hardcoded, but could later be dynamically extended without changing the
 *   interface
 */
class CRM_Eventcheckin_CheckinFields
{
    /**
     * Get a list of all field specs that _could_ be displayed
     *  on the checkin screen to verify the participant
     *
     * @return array
     *   list of field specs
     */
    public static function allFields()
    {
        return [
            'first_name'   => [
                'name'        => 'first_name',
                'type'        => 'Text',
                'path'        => 'contact.first_name',
                'label'       => E::ts('First Name'),
            ],
            'last_name'    => [
                'name'        => 'last_name',
                'type'        => 'Text',
                'path'        => 'contact.last_name',
                'label'       => E::ts('Last Name'),
            ],
            'display_name'    => [
                'name'        => 'display_name',
                'type'        => 'Text',
                'path'        => 'contact.display_name',
                'label'       => E::ts('Display Name'),
            ],
            'event_title'    => [
                'name'        => 'event_title',
                'type'        => 'Text',
                'path'        => 'event.title',
                'label'       => E::ts('Event Title'),
            ],
            'registration_date'    => [
                'name'        => 'registration_date',
                'type'        => 'Date',
                'path'        => 'participant.participant_register_date',
                'label'       => E::ts('Registration Date'),
            ],
        ];

    }

    /**
     * List of field_id => field_label if all eligible fields
     *
     * @return array
     *   field list
     */
    public static function getFieldList()
    {
        $field_list = [];
        $all_fields = self::allFields();
        foreach ($all_fields as $field_spec) {
            $field_list[$field_spec['name']] = $field_spec['label'];
        }

        return $field_list;
    }
}
