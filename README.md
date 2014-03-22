# STAGE - WordPress Theme Framework 

STAGE is a sleek and modern starter theme built with Bootstrap 3.1.1 and designed to be a flexible foundation for quicker WordPress development. This theme is packed with multiple page templates, menu locations, widget areas and some unique features like the off-canvas menu, scrollbar etc. STAGE was built from the ground-up to keep the codebase compact and easy for you to customize. Creating an impressive website with WordPress has never been easier!


## Demo & Screenshots
* Live demo website: [http://wp.turizon.co.in/](http://wp.turizon.co.in/)
* Theme Style Screenshots: [Bootstrap](https://db.tt/m6rnd3gZ), [Amelia](https://db.tt/0xPShSEK), [Cerulean](https://db.tt/8KkQuWKg), [Cosmo](https://db.tt/sQURoIqS), [Cyborg](https://db.tt/Fm44yXWm), [Darkly](https://db.tt/eDE5hyj4), [Flatly](https://db.tt/SMgfjWd0), [Lumen](https://db.tt/JV6BWEgl), [Simplex](https://db.tt/Rww3tVUe), [Slate](https://db.tt/B3z4CvgM), [Superhero](https://db.tt/qHEWYh5M), [Yeti](https://db.tt/71YJh7YV)


## Features
* 12 Column Responsive Layout based on Bootstrap 3.1.1
* 2 Homepage layouts - Scrolling Banner & Image Slider
* 2 Blog layouts - List & Grid with pagination
* 11 theme styles from Bootswatch
* Theme Options Panel with 12 settings
* Top Menu with Search, Login/Logout/Register, Gravatar 
* Off-Canvas side-menu 
* Footer - Menu and 4 widget areas
* Styled Search Form and Search results
* WP Page Templates: Archives, Default (with Sidebar on right), Left-Sidebar, Dual Sidebar and Full-Width
* WP Pages: 404 page, Category, Tags, Author Bio, Archive
* Smooth scroll-to-top link in the footer
* Styled Comments form with in-built validation 
* Long form article in-page navigation - ScrollNav.js 2.1.1 (combined with ScrollToFixed 1.0.4)
* Custom styled Srollbar 
* Font Icons (Glyphicons & FontAwesome)
* [Social Share](https://github.com/carrot/share-button) button on Single posts 


## Installation & Setup

First you need to [download the latest version](https://github.com/chiraggude/wordpress-bootstrap/archive/master.zip)

Once you get there there are two ways to install STAGE.

#### Manually

* Upload the zip file to /wp-content/themes/ and unzip it.
* Activate the theme via the Admin > Appearance > Manage Themes 

#### Automatically

* Go to Admin > Appearance > Install Themes tab > Upload 
* Click on "Browse" and upload the .zip
* Activate it via the Admin > Appearance > Manage Themes

#### Install Redux Framework plugin

* After activating the theme, you will see a notice that will prompt you to install the Redux Framework (required for the theme options panel). 
* Click on "Begin Installing plugin" to download and install the plugin from www.wordpress.org. 
* After install the plugin, click on "Return to the Dashboard". Now you will see a new panel "STAGE Option" like this [screenshot](https://db.tt/fuAMDrzo). 

You can now start customizing your theme!

If your wordpress website has content, then jump to the "Get Started" section to setup your homepage, blog page, menus etc.

## Demo Content

If you have installed STAGE on a fresh installation of WordPress, your homepage will look like this [screenshot](https://db.tt/s7QJiMmH). 

**Step 1 -** 
To replicate the look and feel of the demo, download this [sample-content-xml](https://db.tt/TVQFzjJC) to your desktop. Right click and "save as" to your Desktop

**Step 2 -**
Next, go to the WordPress admin backend > Tools > Import > WordPress > Install & activate the Importer plugin if required 
* Click "Choose File" > Upload the [sample-content-xml](https://db.tt/TVQFzjJC)
* Click "Upload file & import" > Assign authors as required 
* Select the checkbox for "Download and import file attachments" 
* Submit


After few seconds you should see the "All Done. Have fun!" message

Now if you go to your homepage, your website should look like this [screenshot](https://db.tt/toEoAhb2)

## Get Started

#### Homepage & Blog 
In WordPress Admin backend, go to Settings >  Reading 
* Select the radio button for "A static page" 
* For the "Front page", select the page "Home" or "Home with Slider" 
* For "Posts page", select the page "Blog" 
* For "Blog pages show at most", change "10" to "5"
* Save changes

Now your website should look like this [screenshot](https://db.tt/zJnSHZFQ)

#### Menus
In WordPress Admin backend, go to Appearance >  Menus 
* Click on the "Manage Locations" tab on the top
* Select "Menu 1" as Primary Menu
* Select "Menu 2" as Side Menu
* Select "Menu 3" as Footer Menu
* Save Menu

Now your website should look like this [screenshot](https://db.tt/3BKijoSh)

#### Widgets
In WordPress Admin backend, go to Appearance >  Widgets
* Drag one or more widgets into the "Main Sidebar" and "Left Sidebar"
* Drag one or more widget in to the following Widget Areas: Footer Column 1, 2, 3 and 4

Now your website should look like this [screenshot](https://db.tt/HDtLZ6Yd)

---

**NOTE**: I have peronally noticed a bug in WP 3.8.1 where widgets don't expand in the admin area. This bug was present in Chrome, Firefox  & IE. A quick fix was to click on the "screen options" at the top of the Widgets page in the admin area and select "Enable accessibility mode"

---


### Tips & Tricks
* **IE8 Compatibility** - The bootstrap.min.css file should not be hosted on a CDN, instead it should be hosted on your server for respond.js to work. 
* **Theme File Structure** - COMING SOON


## FAQ's 

**Who is this theme aimed at?**

This theme is best suited for web designers and developers familiar with WordPress.

**Why is STAGE called a theme framework?**

STAGE is theme framework as defined [here](http://codex.wordpress.org/Theme_Frameworks)

**What was the inspiration behind building STAGE?**

I needed a starter theme to serve as the code base for all my WordPress projects. There are lots of great theme frameworks already available, but none suited my particular needs. This theme is my first attempt at forging a framework that fits my particular tastes. Perhaps other like-minded developers will like it too.



## Road Map

Add native WordPress support for:
* Featured Content
* Post-Formats
* Custom Backgrounds
* Visual Editor Styles
* Internationalization

## Built With
* WordPress 3.8.1
* Bootstrap 3.1.1
* MMenu 4.2.1
* Redux Framework 3.1.9
* Font Awesome 4.0.3
* jQuery Validation Plugin 1.11.1 
* [WP Bootstrap Navwalker 2.0.4](https://github.com/twittem/wp-bootstrap-navwalker) 
* TGM  Plugin Activation class 2.4.0 
* NiceScroll v3.5.4


===================
That's it folks!





