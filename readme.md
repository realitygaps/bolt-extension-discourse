Discourse Embedded Comments for Bolt
====================================

This is a bolt extension to use self hosted comments with your installation of discourse.

Still under heavy development!

Requirements
------------
Discourse from https://discourse.org


Use
---

* Define the domain of your discourse install in the config.yml variable discourseurl

* Insert the following twig function in your template where you want the comments diplayed

{{ discourse() }}
