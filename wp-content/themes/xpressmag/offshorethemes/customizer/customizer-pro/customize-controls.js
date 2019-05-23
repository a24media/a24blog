( function( api ) {

	// Extends our custom "kingcabs" section.
	api.sectionConstructor['xpressmag'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );