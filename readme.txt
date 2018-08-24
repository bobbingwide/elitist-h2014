elitist-h2014 v1.2.0 readme.txt
built from elitist-h v1.0.1  
    
see style.css for the information required by WordPress.org

== Original theme ==
The original theme was Elitist. It would have been rather complicated to create a child theme that could do what the client wanted
so I had to clone it to create a derivative theme.
 
For part of the explanation see @link http://herbmiller.me/h2gd-part-24-fatal-error-cannot-redeclare-a/

Subsequently Elitist-h2014 is a new version which alters the display for single portfolio 

== Licensing ==

The Elitist theme is a premium Theme from ThemeForest.
 
The PHP components of the Elitist theme are released under the GNU General Public License
@link http://codex.wordpress.org/GPL

All other parts of the theme including, but not limited to the CSS code, images, and design are licensed according to the license purchased. 
@link http://wiki.envato.com/support/legal-terms/licensing-terms/

In order to comply with the spirit of the Envato license this theme will only be made available to licencees of the original Elitist theme.

== Changelog == 
= 1.2.0 = 
* Change: Support https  Issue #1 
* Change: Support PHP7   Issue #2

= 1.1 = 
* Change: single-portfolio.php replaced by gallery-bootstrap.php
* Change: altered stylesheet and script inclusion so that single portfolio works as bootstrap gallery 
* Change: re-instated call to theme_support().


= 1.0.1 =
* Change: framework/theme_scripts/styles.php - need to set a different border-top-color for the header
* Change: slider-flexslider.php - changed aspect ratio for the slider ( was 940x460 now 940x275 )
* Change: single-portfolio.php - move the content to the right of the image so that it takes less vertical space
* Change: style.css - set the heading to different border colours with more vertical padding and menu to horizontal
* Change: header.php - remove an apparently redundant div "filter_lists" and make navbar full width
* Change: js/portfolio-scripts.js - change getItemWidth() to display more columns in the "isotope" layout
* Change: custom.css - add oik custom CSS for other styling changes
* Based on Elitist v1.0.1, dated Dec 2012

== Sponsored by ==
* Penny Plimmer ( japics.co.uk ) who purchased the original theme
