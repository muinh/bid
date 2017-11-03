# Event Ticket Service 2 in 1 - [bid.ua] 
============================

1. Simple internet service to buy event tickets. 
2. Everyday draw and raffling of event tickets. Take part just bidding 1, 5 or 10 UAH.

  At the moment only alpha-version is available. 

## Tools
### Environment
1. OS: Linux (Ubuntu 16.04).
2. Engine: Apache 2.4.29.
3. DB: MySQL InnoDB.
4. PHP 7.1.11

### Frameworks and libraries
1. Yii2 Framework, basic.
2. Javascript ES5.
3. jQuery (JS library).
4. Twitter Bootstrap.
5. LiqPay SDK.

### What is done?
* General structure of the website and design;
* Main menu and sidebar with categories list;
* Contact form with feedback form implemented;
##### Categories
* Featured events are displayed on the main page;
* Events that belong to the certain category are displayed when this category is picked from the sidebar menu; 
* Each category has its own color. Events that belong to the certain category inherit its color and are underlined with this color;
* Hovering the category user gets it highlighted and name displayed on the block;
##### Events
* Hovering the event in the list user gets shortcut information about the event;
* Clicking the event user gets full information about the event.
* Clicking blue button with the price gets this event to the cart modal window.
* Clicking yellow button is **unavailable right now**.
* Comments block is situated under the buttons block and is **unavailable right now**.
##### Cart
* Cart is available in modal in window and in in window /cart/view;
* In cart you can delete items that you added before;
* Displayed number of items chosen and total amount of the order;
* You can clear cart, keep adding other events or place the order;
* In the cart window you should check all the detailes of the order and click "Order";
* After that you will get the warning page and if you agree, press "Pay" and go the generated LiqPay page;
* LiqPay page is generated using public and private keys with the help of the LiqPay API.
##### Authentication
* Login and Registration modules implemented.
* When user is logged in, log-in button dissappeares, logout button appears instead.
* Administrator has access to Admin Panel. Access to this panel for other users is restricted.
* Reset password feature is implemented.
* User has to sign the form with name, email, phone nr and address if he isn't logged in. **no validation right now**.
##### Admin Panel
* Implemented according to CRUD principles;
* Admin has access to Categories, Events, Orders and Users;
##### Database
* Database creation is presented with migrations; 

### What needs to be done (TODO) ?
* Check validation of all user inputs;
* Implement different email announcements (order created, order payed, shipping received);
* Implement change number of tickets just in the cart feature;
* Implement search mechanism by events;
* Implement dual-language possibility (EN-UA);
* Implement Comments Module using API;
* Implement PrivatBank Tickets API;
* Add unit tests;
* Re-write User implementation using Yii2 Users library;
* Make cart icon became another color when !empty;
* Implement user profile with password change feature, order history and private data change features;
* Make all pages responsive, not just the main page;
* Implement mechanism with making bids and lotteries;
* Implement mechanism with making bids and lotteries in admin panel; 

### How to install?


### Where to get sample images and info for events?


    ```
    tests/bin/yii serve
    ```

