# [![Grav Mobile Detect Plugin](assets/grav-mobile-detect.png)][project]

[![Release](https://img.shields.io/github/release/dimitrilongo/grav-plugin-mobile-detect.svg)](https://github.com/dimitrilongo/grav-plugin-mobile-detect/releases)
[![Issues](https://img.shields.io/github/issues/dimitrilongo/grav-plugin-mobile-detect.svg)](https://github.com/dimitrilongo/grav-plugin-mobile-detect/issues)
[![Downloads](https://img.shields.io/github/downloads/dimitrilongo/grav-plugin-mobile-detect/total.svg)](https://github.com/dimitrilongo/grav-plugin-mobile-detect/archive/master.zip)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE.txt "License")

> This plugin introduces mobile detection.

##### Table of Contents:

* [About](#grav-mobile-detect-plugin)
* [Installation and Updates](#installation-and-updates)
* [Twig Functions](#twig-functions)
* [Usage](#usage)
    * [mobile_detect](#user-content-using--mobile_detect--as-part-of-an--if--statement)
    * [isMobile](#user-content-or-using--ismobile-)
    * [library_version](#get-mobile-detect-library-version-number)
    * [getUserAgent](#retrieve-the-user-agent)
    * [getHttpHeaders](#retrieves-the-http-headers)
    * [mobileGrade](#retrieve-the-mobile-grading)
    * [isUserAgent](#user-content-list-of-user-agent-for--isuseragentproperty-)
    * [version](#user-content-get-the-version-of-the-given-property-in-the-user-agent)
* [Disclaimer](#disclaimer)
* [Troubleshooting](#troubleshooting)
* [Contributing](#contributing)
* [License](#license)
* [Thanks](#thanks)

# Grav Mobile Detect Plugin

The **Grav Mobile Detect Plugin** for [Grav](http://github.com/getgrav/grav) adds the ability to detect mobile devices (including tablets). It uses the User-Agent string combined with specific HTTP headers to detect the mobile environment.

This plugin use PHP class [Mobile Detect project](https://github.com/serbanghita/Mobile-Detect) [![Latest Stable Version](https://poser.pugx.org/mobiledetect/mobiledetectlib/v/stable.svg)](https://packagist.org/packages/mobiledetect/mobiledetectlib)

# Installation and Updates

The **Grav Mobile Detect Plugin** is easy to install with GPM.

```
$ bin/gpm install mobile-detect
```

Or clone from GitHub and put in the `user/plugins/mobile-detect` folder.

For more informations, please check the [Installation and update guide](docs/INSTALL.md).

# Twig Functions

|Twig functions|Docs|Return|
|-------------|-------------|-------------|
|`{{ isMobile() }}`| Detect if is Mobile|`bool`|
|`{{ isTablet() }}`| Detect if is Tablet|`bool`|
|`{{ isDesktop() }}`| Detect if is Desktop|`bool`|
|`{{ library_version() }}`| Get the current script version.|`string`|
|`{{ mobile_detect() }}`| Detect device type|`string: tablet, phone or desktop`|
|`{{ mobileGrade() }}`| Retrieve the mobile grading|`string: A, B or C`|
|`{{ getUserAgent() }}`| Retrieve the User-Agent|`string`|
|`{{ getHttpHeaders() }}`| Retrieves the HTTP headers|`array`|
|`{{ isUserAgent($property) }}`| Checks for a certain [property](#user-content-list-of-user-agent-for--isuseragentproperty-) in the userAgent|`bool`|

# Usage

Inside content files.

## Using as part of logic

### Examples :

##### Using `{{ mobile_detect() }}` as part of an `{% if %}` statement:

```twig
{% if mobile_detect() == 'desktop' %}
    do something
{% else %}
    do something else
{% endif %}
```
##### or using `{{ isMobile() }}`

```twig
{% if isMobile() %}
    do something
{% else %}
    do something else
{% endif %}
```

#### Get Mobile Detect library version number
```
{{ library_version() }}
```

#### Example Output for `{{ library_version() }}`
```
2.8.22
```

#### Retrieve the User-Agent
```
{{ getUserAgent() }}
```

#### Example Output for `{{ getUserAgent() }}`
```
Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1
```

#### Retrieves the HTTP headers
```twig
<ol>
{% for key,value in getHttpHeaders() %}
 <li>{{ key }} : {{ value }}</li>
{% endfor %}
</ol>
```

#### Example Output for `{{ getHttpHeaders() }}`

<ol>
 <li> HTTP_HOST : MY-WEBSITE</li>
 <li> HTTP_CONNECTION : keep-alive</li>
 <li> HTTP_CACHE_CONTROL : max-age=0</li>
 <li> HTTP_UPGRADE_INSECURE_REQUESTS : 1</li>
 <li> HTTP_USER_AGENT : Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36</li>
 <li> HTTP_ACCEPT : text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8</li>
 <li> HTTP_ACCEPT_ENCODING : gzip, deflate, sdch</li>
 <li> HTTP_ACCEPT_LANGUAGE : fr-FR,fr;q=0.8,en-US;q=0.6,en;q=0.4</li>
 <li> HTTP_COOKIE : XXXXXXXX</li>
</ol>

#### Retrieve the mobile grading
```
{{ mobileGrade() }}
```

#### Example Output for `{{ mobileGrade() }}`
```
A
```

### What is mobile grading ?

>We use a 3-level graded browser support system: A (full), B (full minus Ajax), C (basic HTML). The visual fidelity of the experience and smoothness of page transitions are highly dependent on the CSS rendering capabilities of the device and platform so not all A grade experience will be pixel-perfect but that’s the nature of the web.

Quoted from [jQuery Mobile](http://jquerymobile.com/browser-support/1.4/)

Graded Browser Support [jQuery Mobile](http://jquerymobile.com/browser-support/1.4/)

## List of User Agent for `{{ isUserAgent($property) }}` ![Status](https://img.shields.io/badge/status-beta-red.svg)

|Twig functions|Agent|Return|
|-------------|-------------|-------------|
|`{{ isUserAgent('iOS') }}`| `iOS`|`bool`|
|`{{ isUserAgent('Webkit') }}`| `Webkit`|`bool`|
|`{{ isUserAgent('BlackBerry') }}`| `BlackBerry`|`bool`|
|`{{ isUserAgent('Firefox') }}`| `Firefox`|`bool`|
|`{{ isUserAgent('Chrome') }}`| `Chrome`|`bool`|
|`{{ isUserAgent('AndroidOS') }}`| `AndroidOS`|`bool`|
|`{{ isUserAgent('Skyfire') }}`| `Skyfire`|`bool`|
|`{{ isUserAgent('Opera') }}`| `Opera`|`bool`|
|`{{ isUserAgent('MeeGoOS') }}`| `MeeGoOS`|`bool`|
|`{{ isUserAgent('Tizen') }}`| `Tizen`|`bool`|
|`{{ isUserAgent('Dolfin') }}`| `Dolfin`|`bool`|
|`{{ isUserAgent('UC Browser') }}`| `UC Browser`|`bool`|
|`{{ isUserAgent('NookTablet') }}`| `NookTablet`|`bool`|
|`{{ isUserAgent('SymbianOS') }}`| `SymbianOS`|`bool`|
|`{{ isUserAgent('Kindle') }}`| `Kindle`|`bool`|

You can mix :
```twig
{% if isUserAgent('Chrome') and isUserAgent('AndroidOS') %}
    do something
{% else %}
    do something else
{% endif %}
```

#### Get the version of the given property in the User-Agent ![Status](https://img.shields.io/badge/status-beta-red.svg)

```
{{ version('Android') }}
```

#### Example Output for `{{ version('Android') }}`
```
5.0
```

## List of property in User Agent for `{{ version($property) }}`

|Property||||
|-------------|-------------|-------------|-------------|
|`Mobile`|`IE`|`Skyfire`|`Windows Phone OS`|
|`Build`|`NetFront`|`Tizen`|`Windows Phone`|
|`Version`|`NokiaBrowser`|`Webkit`|`Windows CE`|
|`iPad`|`Opera`|`PaleMoon`|`Windows NT`|
|`iPhone`|`Opera Mini`|`Gecko`|`Symbian`|
|`iPod`|`Opera Mobi`|`Trident`|`webOS`|
|`Kindle`|`UC Browser`|`Presto`|`VendorID`|
|`Chrome`|`MQQBrowser`|`Goanna`|
|`Coast`|`MicroMessenger`|`iOS`|
|`Dolfin`|`baiduboxapp`|`Android`|
|`Firefox`|`baidubrowser`|`BlackBerry`|
|`Fennec`|`Iron`|`BREW`|
|`Edge`|`Safari`|`Java`|

WARNING: this method is in BETA, some keyword properties will change in the future.
For instance : [#376](https://github.com/serbanghita/Mobile-Detect/issues/376)

# Troubleshooting

Grav CMS Cache + Mobile Detect Conflict see [#1](https://github.com/dimitrilongo/grav-plugin-mobile-detect/issues)

If you find a bug, [please open a new issue][issues]

# Disclaimer

I've 'written' this plugin for my own use. It comes without any guarantee, so your mileage may vary in using it. If you find bugs or have great additions you'd like to share, use github to fork the project and share your improvements by initiating pull request

# Tested on Grav

[![Latest Stable Version](https://poser.pugx.org/getgrav/grav/v/stable)](https://packagist.org/packages/getgrav/grav)

# Contributing

You can contribute at any time! Before opening any issue, please search for existing issues and review the [guidelines for contributing](docs/CONTRIBUTING.md).

After that please note:

* If you find a bug, would like to make a feature request or suggest an improvement, [please open a new issue][issues]. If you have any interesting ideas for additions to the syntax please do suggest them as well!
* Feature requests are more likely to get attention if you include a clearly described use case.
* If you wish to submit a pull request, please make again sure that your request match the [guidelines for contributing](docs/CONTRIBUTING.md) and that you keep track of adding unit tests for any new or changed functionality.

See also the list of [contributors] who participated in this project.

# Licence

See [Licence](https://github.com/dimitrilongo/grav-plugin-mobile-detect/blob/master/LICENSE.txt)

# Thanks

[serbanghita/Mobile-Detect](https://github.com/serbanghita/Mobile-Detect)

[haikulab/statamic-mobile-detect](https://github.com/haikulab/statamic-mobile-detect)

[Sommerregen/grav-plugin-shortcodes](https://github.com/Sommerregen/grav-plugin-shortcodes)

[getgrav/grav](https://github.com/getgrav/grav)

[github]: https://github.com/dimitrilongo/ "GitHub account from Dimitri Longo"
[mit-license]: http://www.opensource.org/licenses/mit-license.php "MIT license"

[project]: https://github.com/dimitrilongo/grav-plugin-mobile-detect
[issues]: https://github.com/dimitrilongo/grav-plugin-mobile-detect/issues "GitHub Issues for Grav Mobile Detect Plugin"
[contributors]: https://github.com/dimitrilongo/grav-plugin-mobile-detect/graphs/contributors "List of contributors of the project"
