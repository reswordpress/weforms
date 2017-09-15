<?php

/**
 * The Form Class
 *
 * @since 1.0.5
 */
class WeForms_Form {

    /**
     * The form id
     *
     * @var integer
     */
    public $id = 0;

    /**
     * The form title
     *
     * @var string
     */
    public $name = '';

    /**
     * Holds the post data object
     *
     * @var null|WP_post
     */
    public $data = null;

    /**
     * The Constructor
     *
     * @param int|WP_Post $form
     */
    public function __construct( $form = null ) {

        if ( is_numeric( $form ) ) {

            $the_post = get_post( $form );

            if ( $the_post ) {
                $this->id   = $the_post->ID;
                $this->name = $the_post->post_title;
                $this->data = $the_post;
            }

        } elseif ( is_a( $form, 'WP_Post' ) ) {
            $this->id   = $form->ID;
            $this->name = $form->post_title;
            $this->data = $form;
        }
    }

    /**
     * Get all form fields of this form
     *
     * @return array
     */
    public function get_fields() {
        return wpuf_get_form_fields( $this->id );
    }

    /**
     * Get form settings
     *
     * @return array
     */
    public function get_settings() {
        return wpuf_get_form_settings( $this->id );
    }

    /**
     * Get form notifications
     *
     * @return array
     */
    public function get_notifications() {
        return wpuf_get_form_notifications( $this->id );
    }

    /**
     * Get all the integrations
     *
     * @return array
     */
    public function get_integrations() {
        return wpuf_get_form_integrations( $this->id );
    }

    /**
     * Get entries of this form
     *
     * @return array
     */
    public function get_entries() {
        return weforms_get_form_entries( $this->id );
    }
}