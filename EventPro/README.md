# EventPro

## Installation
1. Get EventPro package from github.
   * (optional | recommended) Get Autoloader package from github.
2. Place libs inside your project i.e.: ./my/libs/
3. Get any PSR-4 Autoloader and add namespace "LC\EventPro" 
with path to EventProcessor package. i.e.: ./my/libs/LC/EventPro

## Usage
To use EventPro API, it is recommended to load the "EventProcessor" class in one of your projects base files, because
it should be loaded as early as possible. If you use the static calls (recommended) or provide the class to a global
variable, you now can use it from everywhere inside your project.
All you need to do is to create at least one listener, add it to EventPro and set it to listen to events. Afterwards,
if any method dispatches an event, EventPro will do the magic.

EventPro let you set any amount of listeners to a single event. On dispatched events, it calls the listeners in the
same order they were added to EventPro. You should think of this, as you work with with event handling.

For usage examples see the example files.

## Changelog
* v0.1.0<br/>
  Base classes, tests and usage examples