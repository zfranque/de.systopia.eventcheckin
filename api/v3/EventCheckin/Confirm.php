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

require_once 'remoteevent.civix.php';

use CRM_Eventcheckin_ExtensionUtil as E;

/**
 * EventCheckin.confirm will:
 *  - receive the token
 *  - verify it
 *  - update participant status
 *
 * @param array $spec
 *   API specification blob
 */
function _civicrm_api3_event_checkin_confirm_spec(&$spec)
{
    $spec['remote_contact_id'] = [
        'name'         => 'remote_contact_id',
        'api.required' => 0,
        'title'        => E::ts('Remote Contact ID'),
        'description'  => E::ts('You can identify via a remote contact ID'),
    ];
    $spec['token'] = [
        'name'         => 'token',
        'api.required' => 1,
        'title'        => E::ts('Event-Check-In Token'),
        'description'  => E::ts('Submit a token to be verified'),
    ];
}

/**
 * EventCheckin.confirm will:
 *  - receive the token
 *  - verify it
 *  - update participant status
 *
 * @param array $spec
 *   API specification blob
 */
function civicrm_api3_event_checkin_confirm($params)
{
    // todo: verify API permissions
    // todo: verify local permissions
    // todo: validate token
    // todo: update participant data
}
