## Installation

Download a packed
[release](https://github.com/systopia/de.systopia.eventcheckin/releases) and
install as any other CiviCRM extension.

When installing a development version (i.e. an alpha version, or when checking
out a specific commit), you must run `composer update` inside the extension
directory for its dependencies to be installed.

## Requirements

* PHP v7.0+
* CiviCRM 5.35


## API Informatioon

The extension provides two new API actions:

* `EventCheckin.verify` will receive the token, verify it, return data about
  the recipient to verify the identity and return possible participant status
  options when checked in
* `EventCheckin.confirm` will receive the token, verify it (again), and
  register the participant
