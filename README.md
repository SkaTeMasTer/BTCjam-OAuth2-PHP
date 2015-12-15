# BTCjam-OAuth2-PHP
> A basic OAuth2 protocol wrapper in PHP for the cryptocurrency lending platform BTCjam.

### BETA TESTING
This is still in test phase.  Do not use for production yet...
Contributors are NEEDED, please add your two-cents.

### About
This is a simpler implementation of the Auth protocol, version 2.0.  Specifically designed to access less than enterprise web OAuth2 API servers.  There are a lot of sites that use an API to allow their users to access their data programmatically. The problem is that most are not 100% pure Auth2 specification, they have a slightly modified implementation that can be fickle to deal with.

If you are thinking: "Hey, I will just include this popular generic library...", you will immediately run into problems.  Making modifications to a protocol you are unfamiliar will can be a daunting experience.  

Most of the libraries include too many files with very detailed, feature-rich and complex classes, much of which is way beyond the scope and requirements for your more simple custom web application.  

A more lightweight, application specific, protocol wrapper can be useful in some situations.  Of course, for enterprise web applications you will require something more complete in features, security and stability.

### What is OAuth2?
OAuth version 2.0 endpoints are used to create web server applications that use the OAuth2 authorization procedure to access APIs. The protocol allows users to share specific data with an application while keeping their usernames, passwords, and other information private. 

### Why should I not use Google API Client Libraries?
The complexity of the OAuth2 Authorization protocol implementation in the (Google API Client Library for PHP)[https://github.com/google/google-api-php-client] is too great, it contains over a dozen class files, it's a totally complete protocol, not suited to access average OAuth2 API servers that a lot of developers is interested in.

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

   1. Visit the web site of the API provider and open the (API Settings page)[https://btcjam.com/oauth/applications].
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

### References


+ (Google Developers OAuth2 Protocol)[https://developers.google.com/identity/protocols/OAuth2]
+ (Wordpress Developers OAuth2 docs)[https://developer.wordpress.com/docs/oauth2/]
+ (MSDN: Server Side OAuth Authentication in PHP)[https://msdn.microsoft.com/en-us/library/dn632721.aspx]
+ (Oz as Auth2 replacement)[http://hueniverse.com/2015/09/19/auth-to-see-the-wizard-or-i-wrote-an-oauth-replacement/]
+ (oauth3.net)[http://oauth.net]
