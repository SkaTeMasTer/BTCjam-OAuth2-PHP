# BTCjam-OAuth2-PHP
> A simple PHP implementation of the OAuth 2.0 protocol that uses the BTCjam Authenticated API.

### About
This is a working example that does not include the full functions of the BTCjam API, rather it is more of just a demonstration of the OAuth2 protocol flow necessary to extract data from the API endpoint.

There didn't seem to be any really super-slim OAuth2 libraries in PHP.  For example, Google's implementation contains dozens of files and is very difficult to tweak, should your quirky API ask for it.

This repo contains a library that is a simpler sub-set implementation of the [RFC 6749](http://tools.ietf.org/id/draft-ietf-oauth-v2-22.html).  (Not all features added, since we don't need them for most.)

### What is BTCjam?

The world's largest bitcoin peer-to-peer lending marketplace. Where borrowers get great rates and Investors get great returns.


### What is the OAuth protocol?
RFC 6749: "The OAuth 2.0 authorization framework enables a third-party application to obtain limited access to an HTTP service, either on behalf of a resource owner by orchestrating an approval interaction between the resource owner and the HTTP service, or by allowing the third-party application to obtain access on its own behalf." (October 2012)




 


### What is OAuth2?
OAuth version 2.0 endpoints are used to create web server applications that use the OAuth2 authorization procedure to access APIs. The protocol allows users to share specific data with an application while keeping their usernames, passwords, and other information private. 

### Why should I not use Google API Client Libraries?
The complexity of the OAuth2 Authorization protocol implementation in the [Google API Client Library for PHP](https://github.com/google/google-api-php-client) is too great, it contains over a dozen class files, it's a totally complete protocol, not suited to access average OAuth2 API servers that a lot of developers is interested in.

Some issues include:
+ Interoperability prohibits just creating great products
+ Must make many modifications to static references
+ The authentication protocol must be customized 
+ There are too many class files, making modification can be complex.
+ Requires composer to install the package of classes
+ You do not need most of the functions available

# Getting Started...

### Creating your web application credentials
All web applications that use OAuth2 must have credentials that identify the application to the OAuth2 server. 

To obtain web application credentials for your project, complete these steps:

   1. Visit the web site of the API provider and open the [BTCjam API Settings page](https://btcjam.com/oauth/applications).
   2. Enter a name for this endpoint. (anything is fine)
   3. Enter a Redirect URI, which handles responses from the OAuth2 server.
 
### Loading the Auth2 client library via the callback URL
Depending on how your app is structured you can use this callback in a number of ways, including:
+ Setting your Public API access key.
+ Letting the rest of your app know that the library has loaded and ready for use.
+ Logging in the user for API’s which require OAuth login credentials.
+ Checking that cached OAuth login credentials are still valid.
+ Loading the customized OAuth2 API libraries your app will use.


### Using OAuth2 for Web Server Applications
,,,



### History
+ Dec-21-2015: v1.00 released. 
+ Dec-15-2015: init repo. 


### BTCjam API Protocol References

+ [BTCjam.com](http://btcjam.com)
+ [BTCjam API FAQ](https://btcjam.com/faq/api)


### OAuth 2.0 Coding References

+ Brent Shaffer's [OAuth 2.0 Server Cookbook](https://bshaffer.github.io/oauth2-server-php-docs/cookbook/)
+ Knp University: [OAuth2 in 8 Steps](https://knpuniversity.com/screencast/oauth/)
+ Google Developers: [OAuth2 Protocol](https://developers.google.com/identity/protocols/OAuth2)
+ MSDN: [Implementing an OAuth-Enabled Application in PHP](https://msdn.microsoft.com/en-us/library/dn632721.aspx#Anchor_1)

### OAuth 2.0 Protocol References

+ [RFC 6749](https://datatracker.ietf.org/doc/rfc6749/) - "The OAuth 2.0 Authorization Framework"
+ [The OAuth 2.0 Authorization Protocol (draft-ietf-oauth-v2-22)](http://tools.ietf.org/id/draft-ietf-oauth-v2-22.html)
+ Search the [latest updated OAuth RFCs](https://datatracker.ietf.org/doc/search/?name=oauth&activeDrafts=on&rfcs=on) from IETF
+ [oauth3.net](http://oauth.net)
