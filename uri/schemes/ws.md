---
layout: default
title: Websocket URIs
---

# Websockets URI

To work with websockets URIs you can use the `League\Uri\Schemes\Ws` class.
This class handles secure and non secure websockets URI.

## Validation

Websockets URIs must contain a `ws` or the `wss` scheme. It can not contain a fragment component as per [RFC6455](https://tools.ietf.org/html/rfc6455#section-3).

<p class="message-notice">Adding contents to the fragment component throws an <code>RuntimeException</code> exception</p>

~~~php
use League\Uri\Schemes\Ws as WsUri;

$uri = WsUri::createFromString('wss://thephpleague.com/path/to?here#content');
//throw an RuntimeException - a fragment component was given


$altUri = WsUri::createFromString('//thephpleague.com/path/to?here');
//throw an InvalidArgumentException - no scheme was given
~~~

Apart from the fragment, the websockets URIs share the same [host validation limitation](/uri/schemes/http/#validation) as Http URIs.

## Properties

Websockets URIs objects uses the specialized [HierarchicalPath](/components/hierarchical-path/) class to represents its path. using PHP's magic `__get` method you can access the object path and get more informations about the underlying path.

~~~php
use League\Uri\Schemes\Ws as WsUri;

$uri = WsUri::createFromString('wss://thephpleague.com/path/to?here');
echo $uri->path->getBasename();  //display '/path'
echo $uri->path->getDirname();   //display 'to'
echo $uri->path->getExtension(); //display ''
$uri->path->toArray(); //returns an array representation of the path segments
~~~