# Introduction #

This project presents a popular _template_ that can be used for illustrate, for test, or for benchmark, by any algorithm promoted as being a "template processor".

_Habemus Papam_ is supplied in two forms, described below:
  * [Official](#Official_Template.md): in latin.
  * [Multilingual](#Multilingual_Template.md): in other languages, translations from latin for broadcasting, registered as written record at news media.

## Rationale ##

[Placeholder templates](https://code.google.com/p/smallest-template-system/) are the simplest kind of [template systems](http://en.wikipedia.org/wiki/Template_processor#System_elements),
so, it is important for didactic goals; and as a "minimal criteria",
to check if a system promoted as being "template system", is in fact it.

The "[Habemus Papam](http://en.wikipedia.org/wiki/Habemus_Papam)" announcement rules is, probably, the oldest (1605)
well-knowed and well-documented  formally expressed template.
It is also very popular -- with revivival moments in the news media, [like 2013-03-13](http://stats.grok.se/en/201303/Habemus_Papam) --, and perhaps, also  the "simplest real case" of template use (more than 400 yers of use!).

## Conventions ##
Adopting here the [smallest-template-system](https://code.google.com/p/smallest-template-system/wiki/TemplateSyntax) _template syntax_, with default `{$argument_name}` placeholders.

## Implementations ##
... see downloads ... under construction ...

## Collaboration ##
Please send an e-mail or add a comment at the Wiki pages, for any correction, suggestion or add material.

# Official Template #
Latin is the language of the "Ancient Catholic Church", and the official announcement is only in latin.  The protocol includes an entire context:

<blockquote>
Before the first appearance of the papa at the balcony of Saint Peter's Basilica  a Cardinal Protodeacons give the traditional <i>Habemus Papam</i> announcement in Latin.<br>
</blockquote>

This is the official template, expressed in plain text with placeholders in the [conventions above](#Conventions.md):

```xml
Annuntio vobis gaudium magnum;
Habemus Papam:

Eminentissimum ac reverendissimum Dominum,
Dominum {$FirstName!latinAccusativeCase}
Sanctæ Romanæ Ecclesiæ Cardinalem {$LastName!latinUndeclinedForm},
qui sibi nomen imposuit {$PapalName!latinGenitiveCase}.
```

It is a  [simple placeholder template](https://code.google.com/p/smallest-template-system/wiki/SimplestAlgorithm#Expand_function), but the _placeholder resolution_ have some complexity.

The _Habemus Papam_ announcement rules  require to transform _firstName_ into latin accusative case, _LastName_  in the in the latin undeclined form, and the papal name into genitive case – extending roman numerals in words, if there were.  So, the placeholders receive a format modifier, `{$argument!transform}`, that depends on a dictionary and a Latin orthographic framework, to implements each [piped\_function](https://code.google.com/p/smallest-template-system/wiki/TemplateSyntax#Extensions).

If _template system_ have not this issue, we can delegate this transform rules to the input data supplier, and
modify the template to a simplified version (see below).

## Simplified version ##

```xml
Annuntio vobis gaudium magnum;
Habemus Papam:

Eminentissimum ac reverendissimum Dominum,
Dominum {$FirstName}
Sanctæ Romanæ Ecclesiæ Cardinalem {$LastName},
qui sibi nomen imposuit {$PapalName}.
```

This is template use _direct_ expansion, so is the simplest and more usual for template systems.

# Multilingual Template #

As an global announcement, it must be expressed into many languages. After traditional Saint Peter's Basilica Protocol, the news media do a massive broadcasting, translating the announcement into many other languages.

A [Multilingual template](https://code.google.com/p/smallest-template-system/wiki/SimplestAlgorithm#Multilingual/Multistyle_helper-functions) is a little bit more complex, and must be resolved into two stages: 1) select the language; 2) expand data in the selected template.

<table>

<tr><td>EN</td><td>
<pre><code><br>
I announce to you a great joy;<br>
We have a Pope:<br>
The most eminent and most reverend Lord,<br>
Lord {$FirstName} Cardinal of the Holy Roman Church {$LastName},<br>
Who takes for himself the name of {$PapalName}.<br>
</code></pre></td></tr>

<tr><td>ES</td><td>
<pre><code><br>
Os anuncio un gran gozo;<br>
Tenemos Papa:<br>
El eminentísimo y reverendísimo Señor,<br>
Don {$FirstName},<br>
Cardenal de la Santa Iglesia Romana {$LastName},<br>
Que se ha impuesto el nombre de {$PapalName}.<br>
</code></pre></td></tr>

<tr><td>IT</td><td>
<pre><code><br>
Vi annuncio una grande gioia;<br>
abbiamo il Papa:<br>
L'eminentissimo e reverendissimo Signore<br>
Signor {$FirstName},<br>
Cardinale {$LastName} di Santa Romana Chiesa,<br>
il quale si è imposto il nome di {$PapalName}.<br>
</code></pre></td></tr>

<tr><td>...</td><td>
<pre><code><br>
...<br>
</code></pre></td></tr>

<tr><td>PT</td><td>
<pre><code><br>
Anuncio-vos uma grande alegria;<br>
Temos um Papa:<br>
O eminentíssimo e reverendíssimo Senhor,<br>
Dom {$FirstName}, Cardeal da Santa Romana Igreja {$LastName},<br>
Que se impôs o nome de {$PapalName}.<br>
</code></pre></td></tr>

</table>

See _downloads_ for the complete multilingual template.

Note: lots of translations changed the initial puntuaction, ";" and ":", to ":" and "!".
As example, the English translation will be "_I announce to you a great joy: we have a Pope!_". In this project, the [official punctuaction](http://www.vatican.va/holy_father/francesco/elezione/index_en.htm) is used.

# Input data #

| **PapalName**       | **Year**| **FirstName** | **LastName**|
|:--------------------|:--------|:--------------|:------------|
| Pope Leo XI       | 1605| Alessandro | de' Medici |
| Pope Gregory XV   | 1621| Camillo |Borghese|
| Pope Urban VIII   | 1623| Alessandro |Ludovisi|
| Pope Alexander VII | 1655|Maffeo | Barberini|
| Pope Clement IX   | 1667 |Fabio |Chigi|
| Pope Clement X    | 1670 |Giulio |Rospigliosi|
|... |
| Pope Paul VI       | 1963|Giovanni | Montini|
| Pope John Paul I   | 1978|Albino |Luciani|
| Pope John Paul II  | 1978|Karol | Wojtyła|
| Pope Benedict XVI  | 2005|Joseph | Ratzinger|
| Pope Francis       | 2013|Jorge | Bergoglio|

See _downloads_ for the complete dataset.


------


HISTORICAL NOTES AND SOURCES:

The first well-document record of the adoption of the _Habemus Papam_ is from 1484, year in which it is certain that it was used for the election of Giovanni Battista Cybo, who took the name of Innocent VIII.
Another date suggested is the election of pope Martin V Colonna (1417).  See [Italian Wikipedia references](http://it.wikipedia.org/wiki/Habemus_Papam).

The first version of the list of announcement, from 1605 until today, was obtained from [English Wikipedia](http://en.wikipedia.org/wiki/Habemus_Papam).
