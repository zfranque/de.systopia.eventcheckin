# Event-Checkin (de.systopia.eventcheckin)

A simple Extension to provide a check-in link (and QR code) to participants, 
so they can check in with the event's front desk, or even automatically. 

It also provides an API to allow a remote (more secure) form to do this.

## Features

* Generates check-in links for participants (currently EventMessages only)
* Generates check-in link QR codes for participants (currently EventMessages only)

## API

The extension provides two new API actions:
* ``EventCheckin.verify`` will receive the token, verify it, return data about 
  the recipient to verify the identity and return possible participant status options when checked in
* ``EventCheckin.confirm`` will receive the token, verify it (again), and register the participant
  
## Configuration

Visit the configuration page: ``civicrm/admin/eventcheckin/settings``

## Permissions

In order to check in other contacts, your user has to have the 
"Check-In Event Participants" (``event checkin``) permission. 

If you're using the remote check-in feature, the API user has to have the 
"RemoteContacts: Check-In Event Participants" (``remote event checkin``) permission, 
and the user contact identified by the ``remote_contact_id`` must have the 
"RemoteEvent Check-In User" role.

## Requirements

* PHP v7.0+
* CiviCRM 5.35

Recommended:
* A system that will provide your feedback form such as an external website

## Dependencies

This extension uses [Chillerlan's QR code generator](https://github.com/chillerlan/php-qrcode) to generate QR codes.
