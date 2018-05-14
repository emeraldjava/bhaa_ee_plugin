# bhaa_ee_plugin

A plugin to handle event expresso customisations for the BHAA wordpress site.

[![Build Status](https://travis-ci.org/emeraldjava/bhaa_ee_plugin.svg?branch=master)](https://travis-ci.org/emeraldjava/bhaa_ee_plugin)

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