# bhaa_ee_plugin

A plugin to handle event expresso customisations for the BHAA wordpress site.

[![Build Status](https://travis-ci.org/emeraldjava/bhaa_ee_plugin.svg?branch=master)](https://travis-ci.org/emeraldjava/bhaa_ee_plugin)

- https://github.com/eventespresso/ee-code-snippet-library/blob/master/checkout/bc_custom_post_type_input.php


    // EDIT THE FOLLOWING THREE VARIABLES

    // the slug used to register the custom post type with WordPress
    $custom_post_type_slug = 'espresso_venues';
    // the name you want to appear for this question type in the Event Espresso - Registration Form admin
    $custom_post_type_name = esc_html__('Venue', 'event_espresso');
    // full server path to the CustomPostTypeInput class (see below)
    $path_to_custom_post_type_input = __DIR__ . '/CustomPostTypeInput.php';
    
    // THEN MOVE THE CODE BELOW THE FOLLOWING TWO FILTERS INTO A NEW FILE
    
    // adds new question type to the Event Espresso - Registration Form admin page
    add_filter(
        'FHEE__EEM_Question__construct__allowed_question_types',
        function ($question_types) use ($custom_post_type_slug, $custom_post_type_name)
        {
            $question_types[ $custom_post_type_slug ] = $custom_post_type_name;
            return $question_types;
        }
    );
    // generates the actual question input when used in a registration form
    add_filter(
        'FHEE__EE_SPCO_Reg_Step_Attendee_Information___generate_question_input__default',
        function ($input, $question_type, $question_obj, $options)
        use ($custom_post_type_slug, $path_to_custom_post_type_input)
        {
            if (! $input && $question_type === 'espresso_venues') {
                require $path_to_custom_post_type_input;
                $options['post_type'] = array($custom_post_type_slug);
                $input                = new CustomPostTypeInput($options);
            }
            return $input;
        },
        10,
        4
    );

This is new

    // IMPORTANT !!!
    // MOVE THE FOLLOWING INTO A NEW FILE NAMED: 'CustomPostTypeInput.php'
    // AND update the $path_to_custom_post_type_input variable above to point to it

    /**
     * Class CustomPostTypeInput
     * Description
     *
     * @author  Brent Christensen
     * @since   $VID:$
     */
    class CustomPostTypeInput extends EE_Select_Input
    {
    
        /**
         * @param array $input_settings
         */
        public function __construct($input_settings = array())
        {
            $custom_post_type_query = new WP_Query();
            $custom_post_types      = $custom_post_type_query->query(
                array(
                    'post_type' => is_array($input_settings['post_type'])
                        ? $input_settings['post_type']
                        : array($input_settings['post_type'])
                )
            );
            $answer_options         = array();
            foreach ($custom_post_types as $custom_post_type) {
                if ($custom_post_type instanceof WP_Post) {
                    $answer_options[ $custom_post_type->ID ] = $custom_post_type->post_title;
                }
            }
            parent::__construct($answer_options, $input_settings);
        }
    }

## Resources

Event Espresso

- https://eventespresso.com/wiki/useful-php-code-snippets
- https://github.com/eventespresso/ee-code-snippet-library

Phpunit

- https://stackoverflow.com/questions/15710410/autoloading-classes-in-phpunit-using-composer-and-autoload-php
- https://github.com/jhbsk/phpunit-skeleton/blob/master/phpunit.xml
- https://phpunit.de/getting-started/phpunit-7.html
- https://stackoverflow.com/questions/43188374/update-phpunit-xampp
- https://www.jetbrains.com/help/phpstorm/testing-with-phpunit.html

Travis
 
- https://travis-ci.org/emeraldjava/bhaa_ee_plugin

    function ee_add_question_type_as_options( $question_types ) {
        $question_types[ 'password' ] = __( 'Password', 'event_espresso' );
        return $question_types;
    }
    add_filter( 'FHEE__EEM_Question__construct__allowed_question_types', 'ee_add_question_type_as_options' );
    
    function ee_generate_question( $input, $question_type, $question_obj, $options ) {
        if( ! $input && $question_type == 'password' ) {
            //must return an EE_Form_Input_Base child object, see event-espresso-core/libraries/form_sections/inputs. If they want to create a different class it needs to extend EE_Form_Input_Base and get autoloaded via EEH_Autoloader
            return new EE_Password_Input( $options );
        }
    }
    add_filter( 'FHEE__EE_SPCO_Reg_Step_Attendee_Information___generate_question_input__default', 'ee_generate_question', 10, 4 );