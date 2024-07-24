# Microsoft-auth

### Information
To be able to authenticate with the Microsoft Entra identity platform you must have an account in your organization


### Getting starting

1. clone the repository: 
`git clone https://github.com/PiskorowskiJakub/Microsoft-auth.git`
2. Go to the directory of the project: 
`cd Microsoft-auth` 
3. Run the following command `composer install`
4. Update the autoload paths using `composer dumpautoload`

### Register an application

To be able to authenticate with the Microsoft Entra identity platform and get an access token for Microsoft Graph, you need to create an application registration. 
1. Open a browser and navigate to the [Azure Active Directory admin center](https://aad.portal.azure.com/). Sign in with your Azure account.
2. Select **Azure Active Directory** in the left-hand navigation, then select **App registrations** under Manage.
3. Select **New registration**. On the **Register an application** page, set the values as follows.  
  3.1. Set Name to `Microsoft auth`.  
  3.2. Set **Supported account types** to **Accounts in any organizational directory and personal Microsoft accounts**.  
  3.3. Set **Redirect URI** platform to **Web**, and set the value to `http://localhost/Microsoft-auth/callback.php`.

4. Select **Register**. On the Overview page, copy the value of the **Application (client) ID** and save it.
5. Select **Certificates & secrets** under Manage. Select the **New client secret** button. Enter a value in **Description** and select one of the options for **Expires** and select **Add**.
6. Copy the **Value** of the new secret before you leave this page. It is never displayed again. Save the value for later.

### Use the following steps to get an authorization code.

1. Open your browser and paste in the following URL, replacing `YOUR_CLIENT_ID` with the client ID of your app registration.
``` text
https://login.microsoftonline.com/common/oauth2/v2.0/authorize?client_id=YOUR_CLIENT_ID&response_type=code&redirect_uri=http%3A%2F%2Flocalhost&response_mode=query&scope=User.Read
```
2. Sign in with your Microsoft account. Review the requested permissions and grant consent to continue.
3. Once authentication completes, your browser will redirect to `http://localhost/Microsoft-auth/callback.php`. The browser displays an error that can be safely ignored.
4. Copy the URL from your browser's address bar.
5. Copy everything in the URL between `code=` and `&`. This value is the authorization code.

### In file 'authenticationKeys.php.example`:

- Rename the file from `authenticationKeys.php.example` to `authenticationKeys.php`
- Replace the `$client_id` and `$client_secret` with your credentials from the **Register an application** step.
- Replace `tenant_id` from the **overview** tab with the **Directory ID (tenant)**.
- Replace the `$authorizationCode` with your authorization code.

### Run the application

1. Make sure you have Apache and MySQL installed (e.g. XAMPP or WAMP).
2. Run file `index.php`. 

<!-- https://learn.microsoft.com/en-us/openapi/kiota/tutorials/php-azure?tabs=portal -->