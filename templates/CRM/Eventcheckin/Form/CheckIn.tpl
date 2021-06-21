{*-------------------------------------------------------+
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
+-------------------------------------------------------*}

{crmScope extensionKey='de.systopia.eventcheckin'}

  {if $error_message}
    <div class="crm-event-checkin crm-event-checkin-error">{ts}Error:{/ts} {$error_message}</div>
  {else}

    {foreach from=$fields item=field}
      <div class="crm-section crm-event-checkin crm-event-checkin-attributes">
        <div class="label">{$field.label}</div>
        <div class="content">{$field.value}</div>
        <div class="clear"></div>
      </div>

    {/foreach}

    <div class="crm-submit-buttons">
      {include file="CRM/common/formButtons.tpl" location="bottom"}
    </div>
  {/if}


{/crmScope}

