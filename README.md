# CodAlfred

[![Current Version](https://img.shields.io/github/release/danielstieber/codalfred.svg?style=flat-square)](https://github.com/danielstieber/codalfred/releases)

CodAlfred is a workflow for [Alfred](https://www.alfredapp.com/) that 
allows you to open and create Coda docs.

→ [**Get 10$ discount on Coda paid plans when signing up with this link**](https://coda.io/?r=Qjx7OzpmTa2L6IPfkY-anw)

![Demo](demo.gif)

## Installation
1. [Download the workflow](https://github.com/danielstieber/codalfred/releases/download/v0.0.2/CodAlfred.alfredworkflow)
2. Double click the file that you just downloaded
3. Insert your Coda API Token in the 'apikey' values field ([How to find your API Key](#faq))
4. Complete the installation dialog

### Updating CodAlfred
If you have already installed a previous version, you just need to download the new one and double click the file again. Alfred will open an 'update' window, where you can alter or keep your API key.

## Usage
Available commands:
### Open Docs
Use the command `cd` to list your last used docs. Use `cd DOCNAME` to search for 'keyword'. Highlight the doc you want to open from the results list and press enter, or use the cmd+1, cmd+2 ... shortcut to open a doc directly.

Examples:
```bash
cd 

cd todo
```

### Create a doc
Use the command `cdn DOCNAME`to create a doc. Wait until you see the doc name in the Alfred results list. Press enter to open the doc.

Examples:
```bash
cdn my new todo list 

cdn budget 2019
```
_Note: Don't wait too long during inputing the doc name. Alfred will trigger the doc creation after you stop input text for some miliseconds._

### Other commands
There are some basic commands to quickly open Coda related pages:
*cda* Open Coda doc list
*cdf* Open the Coda formula list
*cdc* Open the Coda community

## FAQ
### Where can I find my API Token?
Open your [Coda Account Settings](https://coda.io/account) and scroll down to *Coda API Tokens*. Use your existing token or generate a new one. A token should look something like this: 12345678-12a3-1a2b-123a-1234567890

## Changelog
### 0.0.3 (September 21, 2020)
* Updated to latest CodaPHP version
_Older versions are no longer supported_
### 0.0.2 (July 18, 2019)
* Fixed a bug, where Docs where not ranked properly
* Added cda, cdf & cdc commands
* Added the element 'Open Coda in Browser' when you not pass an argument (thanks to Nick_Milner for that input)

### 0.0.1 (July 17, 2019)
* Initial version