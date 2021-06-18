# Event-Checkin (de.systopia.eventcheckin)

A simple Extension to provide a check-in link (and QR code) to participants, 
so they can check in with the event's front desk, or even automatically. 

It also provides an API to allow a remote (more secure) form to do this.

## Features

* Generates check-in links for participants (currently EventMessages only)
* Generates check-in link QR codes for participants (currently EventMessages only)

## Requirements

* PHP v7.0+
* CiviCRM 5.35

Recommended:
* A system that will provide your feedback form such as an external website

*Remark*: This extension uses [Chillerlan's QR code generator](https://github.com/chillerlan/php-qrcode) to generate QR codes.

## Configuration

No configuration required.

If you want to use an external landing page, you can provide that on the EventInvitation settings page.

