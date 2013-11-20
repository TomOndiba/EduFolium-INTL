******* MembersMap Plugin *******

Elgg map plugin for showing community members in Google Maps, based on "location" field offering multiple search options.

== Contents ==
1. Features
2. Installation
3. ToDo

== 1. Features ==
- Based on Google Geocoding API
- Elgg caching of user locations
- Use of MarkerClusterer for improving map view when a large number of users are there on map
- Non registered users can see only users with public location.
- Registered users can see all users, online users and friends.
- Search for members based on a given address and radius
- Search for nearby members based on radius
- Search for members on map by name and their nearby members
- Option to show search area.
- Display members of group on map, if this option is enabled on group.
- Compatible with Profile Manager plugin (default 'location' field is required)
- Visit user's profile from map
- Configuration options about google maps
- English and Greek language files

== 2. Installation ==
Requires: Elgg 1.8 or higher

1. Upload membersmap in "/mod/" elgg folder
2. Activate the plugin in the administration panel
3. In Administration/Configure/Settings/Map of Members you can configure several map option
4. To change any of the dialog, words, and sentences, edit 'mod/membersmap/languages/en.php'
5. If using Profile Manager, in the Profile Manager settings, import default fields. Delete fields you don't want but leave location field.
6. Ensure that images at 'mod/membersmap/graphics' are readable from web server

== 3. ToDo ==
- autocomplete in search (souloupoma js)
- improve performance for large number of users
- problem with multiple markers at same location (https://github.com/jawj/OverlappingMarkerSpiderfier, http://jawj.github.com/OverlappingMarkerSpiderfier/demo.html)
- change color of marker
- option to show only no of users by country ???
- option to select marker


