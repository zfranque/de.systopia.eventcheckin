��    "      ,  /   <      �  �   �     �     �     �     �     �               /     ?     L     X     g     �  |   �  �   !    �  �   �     E  %   S  ,   y  3   �     �     �  *   �  R   *     }  �   �  �   +	     �	     �	  B   �	     #
  L  +
  �   x     v     �  $   �     �     �     �          &     7     D     R  "   a  5   �  �   �  �   �  _  S  �   �     F  (   V  9     7   �     �       +     J   @     �  �   �  �   :     �     �  ^   �  	   R        "                                                                                                          !             	                        
       Activate using a custom target link, passing the check-in token as <code>&#123;code&#125;</code>. If you leave this empty, the build-in CiviCRM page is used. Check-In (%1) Check-In Event Participants Check-In Possible Status Check-In QR-Code (data) Check-In QR-Code (image) Check-In Settings Checked-In Status Checkin QR Code Contact Link Custom Link Event Check-In Event is not active any more Fields to show for Verification Here you can select the participant fields to be shown to the check-in user, in order to confirm the participant's identity. If you want tokens to time out, you can set a limit here. Otherwise the links will only stop working, when the event is deactivated. If you're using the remote check-in feature, the API user has to have the "RemoteContacts: Check-In Event Participants" (<code>remote event checkin</code>) permission, and the user contact identified by the <code>remote_contact_id</code> must have the "Remote Check-In User" role. In order to check in other contacts, your user has to have the "Check-In Event Participants" (<code>event checkin</code>) permission. Invalid Token Invalid participant status requested. No eligible statuses for checkin configured. No eligible target statuses for checkin configured. Participant Link Participant Role(s) Participant [%1] doesn't exist (any more). Participant's status is currently '%1', and is therefore not eligible for check-in Settings Updated These are the participant statuses considered to be "checked-in". If you have more than on, the user confirming the check-in will have to select the status. These are the participant statuses eligible for check-in. If the contact's participant is not in one of the selected statuses, check-in will be denied. Token Settings Token Timeout You have to provide the status ID if more than two are configured. unknown Project-Id-Version: de.systopia.eventcheckin
Language-Team: CiviCRM Translators <civicrm-translators@lists.civicrm.org>
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
PO-Revision-Date: 
X-Generator: Poedit 2.0.6
Last-Translator: 
Plural-Forms: nplurals=2; plural=(n != 1);
Language: de_DE
 Um eine externe Check-In Seite zu verwenden, kann hier ein benutzerdefinierter Link generiert werden. Dabei wird der Token via <code>&#123;code&#125;</code> eingebunden. Wenn dieses Feld leer bleibt, so wird die CiviCRM interne Check-In Seite verwendet. Check-In (%1) Teilnehmer Einchecken Teilnehmer Status: Check-In möglich Check-In QR-Code (Daten) Check-In QR-Code (Bild) Check-In Einstellungen Teilnehmer Status: eingecheckt Check-In QR Code Kontakt-Link Externer Link Event Check-In Veranstaltung ist nicht mehr aktiv Anzeige-Felder für die Verifizierung des Teilnehmers Hier können Sie Teilnehmer Informationen auswählen, die beim Check-In angezeigt werden. Mit deren Hilfe sollte es dann möglich sein, der/die TeilnehmerIn zu identifizieren, und den richtigen Status zu ermitteln. Wenn gewünscht ist, dass die Tokens nach einer gewissen Zeit verfallen, so kann hier ein Zeitlimit gesetzt werden. Andernfalls wird das Token ungültig wenn die Veranstaltung deaktiviert wird. Falls Sie die "Remote Check-In" Funktionalität mit einer externen Website verwenden wollen, so muss deren API User die "RemoteContacts: Check-In Event Participants" (<code>remote event checkin</code>) Berechtigung haben, und der Benutzer der mittels der <code>remote_contact_id</code> identifiziert wurde, muss die "Remote Check-In User" Rolle haben. Um Teilnehmer einzuchecken muss der aktuelle Benutzer über die "Check-In Event Participants" (<code>event checkin</code>) Berechtigung verfügen. Invalider Token Illegaler Teilnehmer-Status angefordert. Keine Status für einzucheckende Teilnehmer konfiguriert. Keine Status für eingecheckte Teilnehmer konfiguriert. Teilnehmer-Link Teilnehmerrolle(n) Teilnehmer [%1] ist nicht (mehr) im System. Teilnehmerstatus ist aktuell '%1', und kann daher nicht eingecheckt werden Settings Aktualisiert Dies sind die Teilnehmer-Status die als "eingecheckt" gelten. Falls es mehr als einen gibt, so wird dieser auf der Check-In Seite zur Auswahl angeboten. Dies sind die Teilnehmerstatus für die ein Check-In möglich ist. Falls ein Teilnehmer keinen dieser Status hat, so wird ein Check-In verweigert. Token Einstellungen Lebensdauer Token Gibt es mehr als einen zukünftigen Teilnehmer-Status, so muss dieser mit übermittelt werden. unbekannt 