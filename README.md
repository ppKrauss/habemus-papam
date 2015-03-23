habemus-papam
=============

The oldest and popular *official template*, now offered as a testkit for benchmarking any *template system*.
Template systems can be compared using the official standard input data. Covers all basic template concepts: placeholder, loop, helper functions, dictionaries and multi-lingual templates. You can benchmark and classify template systems by its comproved characteristics.

------

The **_Habemus Papam_ template kit** is useful for benchmarking *template systems*, standardized tests, illustrate concepts, and explore template languages and template engines. Try to compare,

 * XSLT
 * Mustache
 * PHP-as-template
 * [simplest template engines](../../../smallest-template-system).

This project presents the oldest "textual formula", that illustrates, by a 400 years-old real case,  the use of a template system. It can be used also by any algorithm promoted as being a "template processor",  for testing or benchmarking tasks.

See **[Introduction](../../wiki/Introduction)** at Wiki.

## Input data 
Using the [OKFN datasets standards](https://github.com/datasets) standards: 
  * [habemus-papam.csv](./data/habemus-papam.csv) full standard CSV dataset to be used as input in any template system, or to ve used as source for [XML](./_cache/habemus-papam.xml) or [JSON](./_cache/habemus-papam.json) formats. 
  * [datapackage.json](./datapackage.json) describes all columns of the CSV file and its soruces.

## Template
For each popular template language (XSLT, Mustache, Django, etc.) the correspondent extension files. 

* [XSLT template](./templates/official.xsl) is the basic reference-template. All other must to generate the same output.
* Mustache
* PHP
* ...

## Run in testkit
Run the template system (template+input+engine) in your preferred language. See [testkit folder](./testkit).
