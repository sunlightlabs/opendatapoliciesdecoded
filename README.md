# Open Data Policies Decoded

## What is The Open Data Policies Decoded?
Open Data Policies Decoded is a free, open source, web-based application to provide better access to open data policies from various jurisdictions (starting with US cities) online. It's a project based on ("forked from") The State Decoded, but differs in that rather than making all the laws within a jurisdiction more accessible, Open Data Policies Decoded provides this function for laws/policies related to open data across various jurisdictions. By utilizing State Decoded XML Documentation to structure open data policy text, Open Data Policy Decoded makes the language of open data reform more searchable, interconnected, and machine-readable, adding an API, bulk downloads, and semantic analysis tools.

By providing easier to read, more useful, and more open open data policies our goal is to empower government officials and open government advocates alike to more easily mix and match the best aspects of various open data policies "re-forming" reforms and ultimately facilitating the spread of good policy ideas across jurisdictions in the true spirit of open source culture.

## I'm a government official. How do I add my jurisdiction's open data policy?

1. Convert your open data policy into raw text. 
  1. If you need to extract the text from a PDF we recommend using a e PDF OCR tool. For Windows we like FreeOCR.
  2. Remove formatting but keep all returns and line information
  3. Add  your policy it to our [raw text repository](https://github.com/sunlightpolicy/opendata/tree/master/open%20data%20policies%20raw%20text).[Submit a Github issue](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues/new) to for us to add it also. 

2. Convert raw text into [The State Decoded XML format](http://docs.statedecoded.com/xml-format.html). If you have your policy as XML, you can adapt [the provided XSLT](https://github.com/statedecoded/state/blob/master/sample.xsl) to transform it into the proper format. Or if you don't have your policy as XML, you can convert it into XML. Use the [current policy XMLs](https://github.com/sunlightlabs/opendatapoliciesdecoded/tree/master/htdocs/admin/import-data) as an example. 
  1.for the `<unit label="section" identifier="amherstny" level="1">Amherst, NY</unit>` section insert "citystate" in the identifier section as Lower caps ,no spaces or commas. (This is important as the import will fail if there are any any characters) and City, State after the level="1" text. 
  2. for the `<section_number>Amherst,NY(2014)</section_number>` Insert the city,state(year) with no spaces </p>
  3. for the `<catch_line>Legislation (2014)</catch_line>` place the law type (Executive order, legislation, ordinance) and the year of adoption. </p>
  4. Copy the body of the policy between the <text></text> tags. Add `<p>` before every line and a `</p>` after every line. 
  5. between the `<history> </history>`tags put notes/resolution/executive order/references and voting history in this area. such as 
    > (Adopted on, council votes, date etc). At insert the following information. 
    > Enacted: 2014; 
    > Link: http://amherstny.iqm2.com/Citizens/FileOpen.aspx?Type=12&ID=1239&Inline=True;
    > Means: Legislation</p>

3. Copy the XML File into the [/htdocs/admin/import-data folder] (https://github.com/sunlightlabs/opendatapoliciesdecoded/tree/master/htdocs/admin/import-data). You can [Submit an issue](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues/new) to request for a Sunlight Foundation Staff to do this for you. 

4. [Submit an issue](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues/new) to this repo asking to "Import the database" Only Administrators can do this. 

## Project documentation
Project documentation can be found at [docs.statedecoded.com](http://docs.statedecoded.com/), which explains how to install the software, configure it, customize it, use the API, and more. The documentation is stored [as a GitHub project](http://github.com/statedecoded/documentation/), with its content automatically published via [Jekyll](http://jekyllrb.com/), so in addition to reading the documentation, you are welcome to make improvements to it!

## How to help
* Use Open Data Policies Decoded sites and share your feedback in the form of [filing issues](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues)—suggestions for new features, notifications of bugs, etc.
* Write or edit documentation on [the wiki](https://github.com/Open Data Policiesdecoded/Open Data Policiesdecoded/wiki).
* Read through [unresolved issues](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues) and comment on those on which you have something to add, to help resolve them.
* Contribute code to [fix bugs or add features](https://github.com/sunlightlabs/opendatapoliciesdecoded/issues).
* Comb through [existing code](https://github.com/sunlightlabs/opendatapoliciesdecoded) to clean it up—standardizing code formatting, adding docblocks, or editing/adding comments.

## Keep up to date
Follow along on Twitter 

## Supported by
Open Data Policies Decoded development was funded by the [Bloomberg Philanthropies] (http://www.bloomberg.org) [What Works Cities] (http://whatworkscities.bloomberg.org) initiative. 
Development of State Decoded (the software for which Open Data Policies Decoded software was based on) was funded by [the John S. and James L. Knight Foundation’s News Challenge](http://www.knightfoundation.org/grants/20110158/). 
