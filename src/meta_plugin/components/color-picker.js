import classnames from 'classnames/dedupe';

const WPColorPicker = wp.components.ColorPicker;

const { Component } = wp.element;

const { __ } = wp.i18n;

const {
    Dropdown,
    Tooltip,
    BaseControl,
} = wp.components;

const {
    ColorPalette,
} = wp.blockEditor;

export default class ColorPicker extends Component {
    render() {
        const {
            value,
            onChange,
            label,
            help,
            alpha = false,
        } = this.props;

        return (
            <BaseControl
                label={ label }
                help={ help }
                className="kioken-component-color-picker-wrapper"
            >
                <Dropdown
                    className={ classnames( 'components-color-palette__item-wrapper', value ? '' : 'components-color-palette__custom-color' ) }
                    contentClassName="components-color-palette__picker"
                   position="bottom center"
                    renderToggle={ ( { isOpen, onToggle } ) => (
                        <Tooltip text={ __( 'Custom color picker' ) }>
                            <button
                                type="button"
                                aria-expanded={ isOpen }
                                className="components-color-palette__item"
                                onClick={ onToggle }
                                aria-label={ __( 'Custom color picker' ) }
                                style={ { color: value ? value : '' } }
                            >
                                <span className="components-color-palette__custom-color-gradient" />
                            </button>
                        </Tooltip>
                    ) }
                    renderContent={ () => (
                        <div className="kioken-component-color-picker">
                            <WPColorPicker
                                color={ value }
                                onChangeComplete={ ( color ) => {
                                    let colorString;

                                    if ( typeof color.rgb === 'undefined' || color.rgb.a === 1 ) {
                                        colorString = color.hex;
                                    } else {
                                        const { r, g, b, a } = color.rgb;
                                        colorString = `rgba(${ r }, ${ g }, ${ b }, ${ a })`;
                                    }

                                    onChange( colorString );
                                } }
                                disableAlpha={ ! alpha }
                            />
                            <BaseControl
                                label={ __( 'Color palette' ) }
                                className="kioken-component-color-picker-palette"
                            >
                                <ColorPalette
                                    value={ value }
                                    onChange={ ( color ) => onChange( color ) }
                                    disableCustomColors={ true }
                                />
                            </BaseControl>
                        </div>
                    ) }
                />
            </BaseControl>
        );
    }
}
