# Infos

Shows infos about the server/site and a way to add your own information.

To add your own information you'll need to write a provider that must extends `Pingu\Info\Support\InfoProvider` and register it through `\Infos::registerProvider`.

All the providers provided by this module are loaded only when needed through a deferred service.

Infos can be accessed through the command `info`