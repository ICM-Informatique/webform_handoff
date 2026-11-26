# Webform Handoff

Instructions for Claude Code in this repository.

## Project

Generic Drupal 11 module that tracks the email handoff of webform
submissions. See README.md for the planned features and design principles.

## Language

Everything in this repository is written in English: code, comments,
interface strings, configuration, documentation, UML diagrams and commit
messages. The French translation lives only in the module's `.po` file.

## Execution mode

An instruction from the maintainer counts as approval for all the steps it
describes: run them in sequence without asking again in the conversation.
The only confirmations are Claude Code's permission prompts, where the
maintainer clicks Yes or No. If a permission is refused, stop and report.
If a decision is missing from the instruction, ask with clickable choices,
never in free text, and wait. Always stop on an error or an unexpected
result.

## Git

- Commits are signed with the maintainer's key and carry no attribution
  (no `Co-Authored-By` line, no generated-by line).
- Never push, never rewrite published history, never commit to `main`
  directly. Work happens on branches merged by pull request (merge commits
  only).

## Quality

The CI workflow (`.github/workflows/ci.yml`) builds a Drupal 11.4 site with
the module and runs, from the module directory: phpcs (`phpcs.xml.dist`:
Drupal and DrupalPractice), PHPStan at the maximum level with the strict and
deprecation rules (`phpstan.neon.dist`), and the PHPUnit tests in
`tests/src`. All of them must pass before a pull request is merged.

## Design rules

- Use only public Webform extension points (handlers). Never replace or
  extend Webform's internal classes or services.
- No external library. Dependencies: Drupal core and Webform only.
- Never store, log or export personal data: no field values, email
  addresses or file names in entities, logs, exceptions or exports.
- No public route except the failure page.
- Tests use fictitious data only (for example `test@example.com`).
