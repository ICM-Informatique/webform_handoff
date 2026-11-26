# Webform Handoff

> **Status: under development.** There is no release yet and the module is
> not ready for production use. Do not install it on a live site.

Webform Handoff is a Drupal module for forms whose submissions are only sent
by email and must not be kept on the website, for example when visitors
upload sensitive documents.

## Planned features

- A unique, random reference for each submission (for example
  `AB-7KQ4-M2XP`), available as a token in emails and in the confirmation
  message.
- Deletion of uploaded files as soon as the submission has been handed off,
  on disk and in the database, whether or not the email could be sent.
- A delivery record for each submission that contains no personal data: no
  field values, no email addresses and no file names. It records the
  reference, the dates and the result of each step.
- When the email to the recipient fails: a printable failure page for the
  visitor, a failure email instead of the usual acknowledgement, and an
  alert to the site owner that is retried by cron until it succeeds.
- An administration overview of deliveries and failures, with CSV and JSON
  export (also available as a Drush command).
- Configurable retention of delivery records, purged by cron.

## Design principles

- Uses only the public extension points of Webform (handlers); no Webform
  class or service is replaced.
- No external library; dependencies are limited to Drupal core and Webform.
- No personal data stored, logged or exported by the module.

## Requirements

- Drupal 11.4 or later
- [Webform](https://www.drupal.org/project/webform) 6.3 or later

## Installation

The module is not published on drupal.org yet. Until then, declare this
repository in the `repositories` section of your project's `composer.json`:

```json
{
    "type": "vcs",
    "url": "https://github.com/ICM-Informatique/webform_handoff"
}
```

Installation instructions for a released version will be added with the
first release.

## Security

Please do not report security issues in public issues. See
[SECURITY.md](SECURITY.md).

## License

GPL-2.0-or-later. See [LICENSE.txt](LICENSE.txt).

## Maintainers

Developed and maintained by ICM Informatique Sàrl.
