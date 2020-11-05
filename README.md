
# APIgoat API wordpress plugin

This is an example of Wordpress plugin using the APIgoat API

It produce a shortcode to fetch and format content from a APIgoat project API.

It is based on DevinVinson/WordPress-Plugin-Boilerplate(https://github.com/DevinVinson/WordPress-Plugin-Boilerplate)

## Details
* classes/APIgoatList.php is the main shortcode definition
* classes/APIgoatFetchAPI.php contains the authentication and query
* classes/APIgoatDoc.php is a formater

## Installation

1. Clone to the `/wp-content/plugins/` directory
2. Change classes/APIgoatFetchAPI.php to fit your backend authentication
3. Use the shortcode APIgoat_list


License
----

MIT