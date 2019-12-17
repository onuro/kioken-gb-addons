//WP Dependencies
const { __ } = wp.i18n;
const { withSelect, withDispatch } = wp.data;
const { compose } = wp.compose;
const {URLInput} = wp.blockEditor;
const { PanelBody, RangeControl, RadioControl, SelectControl, ToggleControl, TextControl, Tooltip, BaseControl, HorizontalRule } = wp.components;
import ColorPicker from './color-picker';
import Repeater from 'react-simple-repeater';

import {showPbCustomizer, pbgc, pbg_opacity, pb_height, pb_txtcolor, is_zengin } from './customizer_defaults';

//controls
export const MetaToggleControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
      label: props.label,
      customizerVal: props.customizerVal,
    }
  } )
)( ( props ) => {
  return (
      <ToggleControl
        label={ props.label }
        checked={props.metaFieldValue}
        onChange={check => props.setMetaFieldValue( check ) }
      />
  );
} );

export const MetaTextControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
      label: props.label,
      help: props.help,
    }
  } )
)( ( props ) => {
    return (
      <TextControl
        label={ props.label }
        value={props.metaFieldValue}
        help={props.help}
        onChange={value => props.setMetaFieldValue( value ) }
      />
    );
} );

export const URLInputControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
        label: props.label,
    }
  } )
)( ( props ) => {
    return (
      <div>
      <label className="components-base-control__label">{ props.label }</label>
      <URLInput
        value={props.metaFieldValue}
        onChange={ value => props.setMetaFieldValue( value ) }
			/>
      </div>
    );
} );

export const MetaSelectControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
      label: props.label,
      default: props.default,
      options: props.options,
      customizerVal: props.customizerVal,
    }
  } )
)( ( props ) => {
  return (
      <SelectControl
        label={ props.label }
        value={props.metaFieldValue ? props.metaFieldValue : props.customizerVal ? props.customizerVal : props.default }
        className={'kt_flex_left'}
        onChange={value => props.setMetaFieldValue( value ) }
        options={ props.options }
      />
  );
} );

export const MetaRadioControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
      className: props.className,
      label: props.label,
      default: props.default,
      help: props.help,
      options: props.options,
      customizerVal: props.customizerVal,
    }
  } )
)( ( props ) => {
  return (
    <RadioControl
      label={ props.label }
      help={props.help}
      className={props.className}
      selected={ props.metaFieldValue ? props.metaFieldValue : props.customizerVal ? props.customizerVal : props.default }
      onChange={value => props.setMetaFieldValue( value ) }
      options={ props.options }
    />
  );
} );

export const MetaColorControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
      label: props.label,
      customizerVal: props.customizerVal,
    }
  } )
)( ( props ) => {
  return (
      <ColorPicker
        label={ props.label }
        value={ props.metaFieldValue ? props.metaFieldValue : props.customizerVal ? props.customizerVal : '#000000' }
      	onChange={ ( color ) => props.setMetaFieldValue( color ) }
        alpha={ true }
      />
  );
} );

export const MetaRangeControl = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { [ props.fieldName ]: value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      metaFieldValue: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ props.fieldName ],
      label: props.label,
      help: props.help,
      min: props.min,
      max: props.max,
      step: props.step,
      customizerVal: props.customizerVal,
    }
  } )
)( ( props ) => {
  return (
      <RangeControl
        label={ props.label }
        value={ props.metaFieldValue ? props.metaFieldValue : props.customizerVal ? props.customizerVal : 0 }
        onChange={ ( value ) => props.setMetaFieldValue( value ) }
        help={props.help}
				min={props.min}
				step={props.step}
				max={ props.max }
			/>
  );
} );




//settings
export const PageTitleSettings = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { 'show_pagetitle': value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      showPageTitle: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ 'show_pagetitle' ],
      showPB: select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'show_page_banner' ],
      label: props.label,
      default: props.default,
    }
  } )
)( ( props ) => {
  return (
    props.showPB === 'hide' &&
    <PanelBody initialOpen={false} title={__('Page Title Settings')}>
	<MetaRadioControl className={'kt_radio_inline'} label={__( 'Page Title:' )} default={ 'show' } fieldName = { 'show_pagetitle' } options={ [ { value: 'show', label: 'Show' }, { value: 'hide', label: 'Hide' } ] } />
      {/*<ToggleControl
        label={ props.label }
		default= { true }
        checked={ props.showPageTitle ? props.showPageTitle : props.default }
        onChange={check => props.setMetaFieldValue( check ) }
      />*/}
      { 'show' === props.showPageTitle &&
        <MetaSelectControl label={__( 'Title Alignment' )} fieldName = { 'page_title_alignment' } options={ [ { value: 'center', label: 'Center' }, { value: 'left', label: 'Left' } ] } />
      }
    </PanelBody>

  );
} );

export const SiteHeaderSettings = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setMetaFieldValue: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { 'override_header': value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      overrideHeader: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ 'override_header' ],
      label: props.label,
    }
  } )
)( ( props ) => {
  return (
    <PanelBody initialOpen={false} title={__('Site Header Settings')}>
      <ToggleControl
        label={ __('Override Header Settings') }
        help={__('Changes the default settings you applied in the customizer for this page')}
        checked={props.overrideHeader}
        onChange={check => props.setMetaFieldValue( check ) }
      />
      { props.overrideHeader &&
        <div>
          <MetaSelectControl label={__( 'Header Wrapper' )} fieldName = { 'header_wrapper' } default={ 'wrapped' } options={ [ { value: 'full-width', label: 'Full Width' }, { value: 'wrapped', label: 'Wrapped' } ] } />
          <MetaRadioControl className={'kt_radio_inline'} label={__( 'Header Background' )} default={ 'white' } fieldName = { 'headerbg' } options={ [ { value: 'white', label: 'White' }, { value: 'transparent', label: 'Transparent' } ] } />
          <MetaRadioControl className={'kt_radio_inline'} label={__( 'Header Text Color' )} default={ 'dark' } fieldName = { 'header_txtcolor' } options={ [ { value: 'white', label: 'White' }, { value: 'dark', label: 'Dark' } ] } />
        </div>
      }
    </PanelBody>
  );
} );


export const LayoutSettings = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setCustomLayout: function( value ) {
        dispatch( 'core/editor' ).editPost(
          { meta: { 'custom_layout': value } }
        );
      }
    }
  } ),
  withSelect( ( select, props ) => {

    return {
      customLayout: select( 'core/editor' )
        .getEditedPostAttribute( 'meta' )
        [ 'custom_layout' ],
      label: props.label,
    }
  } )
)( ( props ) => {
  return (
    <PanelBody initialOpen={false} title={__('Layout Settings')}>
      <MetaTextControl label={__( 'Content Top Padding' )} help={__('Enter custom top padding values (i.e 10px etc)')}  fieldName = { 'content_toppad' }  />
      <ToggleControl
        label={ ! props.customLayout ? __('Custom Layout') : __('Custom Layout Enabled') }
        help={ ! props.customLayout ? __('Enable to change the page/post layout defined in the customizer') : '' }
        checked={props.customLayout}
        onChange={check => props.setCustomLayout( check ) }
      />
      {props.customLayout &&
        <MetaSelectControl label={__( 'Layout' )} fieldName = { 'layout' } options={ [ { value: 'no-sidebar', label: 'No Sidebar' }, { value: 'sb-left', label: 'Left sidebar' }, { value: 'sb-right', label: 'Right sidebar' } ] } />
      }
    </PanelBody>
  );
} );

export const PageBannerSettings = compose(
  withDispatch( ( dispatch, props ) => {
    return {
      setShowPB: ( value ) => {dispatch( 'core/editor' ).editPost({ meta: { 'show_page_banner': value } });},
      setOverridePB: function( value ) {dispatch( 'core/editor' ).editPost({ meta: { 'override_page_banner_settings': value } });},
      setEnableParallax: function( value ) {dispatch( 'core/editor' ).editPost({ meta: { 'enable_page_banner_bgparallax': value } });},
      setEnableAnimate: function( value ) {dispatch( 'core/editor' ).editPost({ meta: { 'enable_page_banner_animate': value } });},
      setShowButton: function( value ) {dispatch( 'core/editor' ).editPost({ meta: { 'enable_pb_button': value } });},
    }
  } ),
  withSelect( ( select, props ) => {
    return {
      showPB: select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'show_page_banner' ],
      overridePB: select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'override_page_banner_settings' ],
      enableParallax: select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'enable_page_banner_bgparallax' ],
      enableAnimate: select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'enable_page_banner_animate' ],
      showButton: select( 'core/editor' ).getEditedPostAttribute( 'meta' )[ 'enable_pb_button' ],
    }
  } )
)( ( props ) => {
// console.log ('customizer show pb is ' + showPbCustomizer);

  return (
    <PanelBody initialOpen={false} title={__('Page Banner Settings')}>

      <MetaSelectControl className={'kt_radio_inline'} label={__( 'Page Banner' )} fieldName = { 'show_page_banner' } options={ [ { value: 'default', label: 'Customizer Default' }, { value: 'hide', label: 'Hide' }, { value: '1', label: 'Show' } ] } />
      { props.showPB !== 'hide' && (
        <div>
        <div className={'kt_hr'}></div>
        <ToggleControl
          label={ props.overridePB ? __('Overriding Page Banner defaults for this page:') : __('Override Page Banner Defaults') }
          help={ ! props.overridePB ? __('Overrides the page banner customizer settings for this page.') : ''}
          checked={props.overridePB}
          onChange={check => props.setOverridePB( check ) }
        />
        { props.overridePB && (
          <div>
          	<MetaTextControl label={__( 'Alternate Image' )}  fieldName = { 'page_banner_altimage' } />
            <MetaColorControl label={__( 'Background Color' )} fieldName = { 'page_banner_bgcolor' } customizerVal = {pbgc} />
            <MetaRangeControl label={__( 'Background Image Opacity' )} fieldName = { 'page_bannerbg_opacity' } min={0.05} step={0.05} max={ 1 } customizerVal={pbg_opacity} />
            <MetaRangeControl label={__( 'Height' )} help={__('Height value in vh(viewport height)')} fieldName = { 'page_banner_height' } min={25} step={5} max={ 100 } customizerVal={pb_height} />
            <MetaRadioControl className={'kt_radio_inline'} label={__( 'Text Color' )} fieldName = { 'page_banner_text_color' } options={ [ { value: 'white', label: 'White' }, { value: 'dark', label: 'Dark' } ] } customizerVal={pb_txtcolor} />
            { is_zengin &&
              <div>
                <ToggleControl
                  label={ props.enableParallax ? __('Parallax Effect Enabled') : __('Enable Parallax Effect') }
                  help={ ! props.enableParallax ? __('Applies a parallax effect to title and background image on scroll ') : ''}
                  checked={props.enableParallax}
                  onChange={check => props.setEnableParallax( check ) }
                />
                <ToggleControl
                  label={ props.enableAnimate ? __('Animated Contents Enabled') : __('Enable Animated Content') }
                  help={ ! props.enableAnimate ? __('Animates the title and other content on page load') : ''}
                  checked={props.enableAnimate}
                  onChange={check => props.setEnableAnimate( check ) }
                />
                <PanelBody initialOpen={true} title={__('Page Banner Content')}>
                  { props.enableAnimate && (
                    <div>
                    <MetaTextControl label={__( 'Animated Title Line 1' )}  fieldName = { 'pb_title_line_1' }  />
                    <MetaTextControl label={__( 'Animated Title Line 2' )}  fieldName = { 'pb_title_line_2' }  />
                    <MetaTextControl label={__( 'Animated Title Line 3' )}  fieldName = { 'pb_title_line_3' }  />
                    <div className={'kt_hr'}></div>
                    </div>
                  )}
                  <MetaTextControl label={__( 'Subtitle' )}  fieldName = { 'pagebanner_subtitle' }  />
                  <MetaSelectControl label={__( 'Subtitle Decoration' )} fieldName = { 'page_banner_subtitle_around' }
                  options={ [ { value: 'line', label: 'Line' }, { value: 'square', label: 'Square' }, { value: 'circle', label: 'Circle' } ] } />

                  <ToggleControl
                    label={ props.showButton ? __('Displaying Button') : __('Show Button') }
                    help={ ! props.showButton ? __('Displays a call to action button') : ''}
                    checked={props.showButton}
                    onChange={check => props.setShowButton( check ) }
                  />
                  { props.showButton && (
                    <div>
                      <URLInputControl label={__('Button Link')} fieldName={ 'pb_button_url' } />
                      <MetaTextControl label={__( 'Button Text' )}  fieldName = { 'pb_button_text' }  />
                      <MetaSelectControl label={__( 'Button Style' )} fieldName = { 'pb_button_style' }
                      options={ [ { value: 'std', label: 'Standard' }, { value: 'bavarian', label: 'Bavarian Style' } ] } />

                    </div>
                  )}



                </PanelBody>
              </div>
            }
          </div>
        )}

        </div>
      )}


    </PanelBody>
  );
} );
