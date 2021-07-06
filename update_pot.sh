#!/bin/sh
# quick and dirty script to update the .pot file
l10n_tools="../civi_l10n_tools"

# hide vendor folder from parser
mv vendor /tmp/event_checkin_vendor

# generate POT file
${l10n_tools}/bin/create-pot-files-extensions.sh de.systopia.eventcheckin ./ l10n

# restore vendor folder
mv /tmp/event_checkin_vendor vendor
