//WP Dependencies
const { __ } = wp.i18n;
const { registerPlugin } = wp.plugins;
const { PluginSidebar, PluginSidebarMoreMenuItem, PluginDocumentSetting } = wp.editPost;
const { Component, Fragment, } = wp.element;
const { PanelBody, TextControl } = wp.components;
const { select, dispatch, withSelect, withDispatch } = wp.data;
const { compose } = wp.compose;

import {PageTitleSettings, SiteHeaderSettings, PageBannerSettings, LayoutSettings } from './components/controls';
import {showPbCustomizer, pbgc } from './components/customizer_defaults';
import icons from './components/icons';
import './editor.scss';

/**
 * Build the row edit
 */
class KiokenPostMeta extends Component {
	constructor() {
		super( ...arguments );
  }

	// const testData = select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'show_page_banner' ];
	// console.log ('pb bg color is ' + pbgc);

	render() {

		return (
			<Fragment>
      <PluginSidebarMoreMenuItem
					target="kioken-postmeta"
					icon={ icons.tune }
				>
					{ __( 'Page Options' ) }
				</PluginSidebarMoreMenuItem>
        <PluginSidebar isPinnable={ true } icon={ icons.tune } name="kioken-postmeta" title={ __( 'Page Options' ) } >

						<PageBannerSettings />
						<LayoutSettings />
						<PageTitleSettings label={__( 'Show Page Title' )} />
						<SiteHeaderSettings />

				</PluginSidebar>
			</Fragment>
		);
	}
}


registerPlugin( 'kioken-postmeta', {
	render: KiokenPostMeta,
} );


