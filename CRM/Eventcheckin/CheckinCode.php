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

class CRM_Eventcheckin_CheckinCode
{
    const PARTICIPANT_CODE_USAGE = 'checkin';

    /**
     * Generates a check-in token for the given participant
     *
     * @param string $participantId
     *
     * @return string participantId
     *   the token
     *
     * @throws \Exception
     */
    public static function generate(string $participantId): string
    {
        return CRM_Remotetools_SecureToken::generateEntityToken(
            'Participant',
            $participantId,
            null,
            self::PARTICIPANT_CODE_USAGE
        );
    }

    /**
     * Validate a given check-in token and return the participant ID if valid
     *
     * @param string code
     *   the code submitted
     *
     * @return string|null The participant ID or, if invalid, null.
     */
    public static function validate(string $code)
    {
        $participantId = CRM_Remotetools_SecureToken::decodeEntityToken(
            'Participant',
            $code,
            self::PARTICIPANT_CODE_USAGE
        );

        return $participantId;
    }

    /**
     * Generate a check-in link with the given token,
     *  using the configuration values
     *
     * @param string token
     *   the token submitted
     *
     * @return string|null The participant ID or, if invalid, null.
     */
    public static function generateLink(string $token)
    {
        // TODO: implement for external links
        return CRM_Utils_System::url('civicrm/event/checkin?token=' . $token);
    }
}
