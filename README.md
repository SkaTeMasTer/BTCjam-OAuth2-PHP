# BTCjam-OAuth2-PHP
> A basic OAuth2 protocol wrapper in PHP for the cryptocurrency lending platform BTCjam.


### BETA TESTING
This is still in test phase.  Although, it works 100% fine.

Contributors are welcome!  I'm happy to commit changes...

### About
This is a simpler sub-set implementation of the [The OAuth 2.0 Authorization Protocol](http://tools.ietf.org/id/draft-ietf-oauth-v2-22.html).  Not all features added, since we don't need them for most APIs.

Most of the OAuth2 libraries are bloated and include too many files with very detailed, feature-rich and complex classes, much of which is way beyond the scope and requirements for your more simple custom web application.  

What you need sometimes is just a more lightweight, protocol wrapper can be useful in some situations.  

### What is BTCjam?

World's largest bitcoin peer to peer lending marketplace. Where borrowers get great rates and Investors get great returns.

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


### References

+ Knp University's [OAuth2 in 8 Steps](https://knpuniversity.com/screencast/oauth/)
+ [Google Developers OAuth2 Protocol](https://developers.google.com/identity/protocols/OAuth2)
+ [MSDN: Server Side OAuth Authentication in PHP](https://msdn.microsoft.com/en-us/library/dn632721.aspx)
+ [The OAuth 2.0 Authorization Protocol (draft-ietf-oauth-v2-22)](http://tools.ietf.org/id/draft-ietf-oauth-v2-22.html)
+ [oauth3.net](http://oauth.net)
+ [BTCjam.com](http://btcjam.com)
+ [BTCjam API FAQ](https://btcjam.com/faq/api)

