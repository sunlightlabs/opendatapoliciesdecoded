# Open Data Policies Decoded

## What is The Open Data Policies Decoded?
The Open Data Policies Decoded is a free, open source, web-based application to display open data policies online. Although it's meant for laws, it'll basically work for any structured legal text. It makes legal text searchable, interconnected, and machine-readable, adding an API, bulk downloads, and powerful semantic analysis tools. With The Open Data Policies Decoded, open data policies become vastly easier to read, more useful, and more open.


## Is this ready for prime time?
Quite nearly! The current release is being used in production on a half-dozen different sites, with [no serious bugs](https://github.com/statedecoded/statedecoded/issues?direction=desc&labels=Bug&milestone=2&state=open), and is certainly in good enough shape to be used on websites that aren't official, government-run repositories of the law. The only catch is that, until v1.0 is released (the next major release due out), there's no built-in upgrade path to new releases. That said, it's easy enough to install a new version and just re-import your site's legal code.

This is a pre-v1.0 release, which is to say that it isn't quite done. A capable developer who is comfortable with legal terminology should be able to wrangle her laws into this release with a couple of hours of work.

## How do get my policy into The Open Data Policies Decoded?
There are two ways.

1. Natively, The Open Data Policies Decoded imports XML in [The State Decoded XML format](http://docs.statedecoded.com/xml-format.html). If you have your legal code as XML, you can adapt [the provided XSLT](https://github.com/statedecoded/state/blob/master/sample.xsl) to transform it into the proper format. Or if you don't have your legal code as XML, you can convert it into XML.
1. Skip XML entirely and [modify the included parser](http://docs.statedecoded.com/parser.html) to import it in the format in which you have it.

## Project documentation
Project documentation can be found at [docs.statedecoded.com](http://docs.statedecoded.com/), which explains how to install the software, configure it, customize it, use the API, and more. The documentation is stored [as a GitHub project](http://github.com/statedecoded/documentation/), with its content automatically published via [Jekyll](http://jekyllrb.com/), so in addition to reading the documentation, you are welcome to make improvements to it!

## How to help
* Use Open Data Policies Decoded sites and share your feedback in the form of [filing issues](https://github.com/statedecoded/statesdecoded/issues/new)—suggestions for new features, notifications of bugs, etc.
* Write or edit documentation on [the wiki](https://github.com/Open Data Policiesdecoded/Open Data Policiesdecoded/wiki).
* Read through [unresolved issues](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues) and comment on those on which you have something to add, to help resolve them.
* Contribute code to [fix bugs or add features](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues).
* Comb through [existing code](https://github.com/sunlightlabs/opendatapoliciesdecoded) to clean it up—standardizing code formatting, adding docblocks, or editing/adding comments.

## Keep up to date
Follow along on Twitter 

## Supported by
Open Data Policies Decoded development was funded by the [Bloomberg Philanthropies] (http://www.bloomberg.org) [What Works Cities] (http://whatworkscities.bloomberg.org) initiative. 
Development of State Decoded (the software for which Open Data Policies Decoded software was based on) was funded by [the John S. and James L. Knight Foundation’s News Challenge](http://www.knightfoundation.org/grants/20110158/). 