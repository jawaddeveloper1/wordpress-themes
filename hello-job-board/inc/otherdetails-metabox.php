<?php 

      class job_otherdetails_metabox {

        private $screens = array('hello-job');

        private $fields = array(
          array(
            'label' => 'Job Type',
            'id' => 'jjobtype',
            'type' => 'select',
            'options' => array(
               'Part Time',
               'Full Time',
               'Project Based',
            ),
           ),
          array(
            'label' => 'Budget From',
            'id' => 'jbudgetfrom',
            'type' => 'number',
           ),
          array(
            'label' => 'Budget To',
            'id' => 'jbudgetto',
            'type' => 'number',
           ),
           array(
            'label' => 'Budget',
            'id' => 'jbudget',
            'type' => 'select',
            'options' => array(
               'Per Week',
               'Per Month',
               'Per Year',
            ),
           ),  
          array(
            'label' => 'How To Apply',
            'id' => 'jhowtoapply',
            'type' => 'select',
            'options' => array(
               'Email',
               'Phone',
               'Custom Link',
            ),
           ), 
           array(
            'label' => 'How To Apply (Email/Phone/Custom Link)',
            'id' => 'jhowtoapply_link',
            'type' => 'text',
           )  
        );

        public function __construct() {
          add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
          add_action( 'save_post', array( $this, 'save_fields' ) );
        }

        public function add_meta_boxes() {
          foreach ( $this->screens as $s ) {
            add_meta_box(
              'job_otherdetails',
              __( 'Other Details', 'hello-job-board' ),
              array( $this, 'meta_box_callback' ),
              $s,
              'advanced',
              'high'
            );
          }
        }

        public function meta_box_callback( $post ) {
          wp_nonce_field( 'job_otherdetails_data', 'job_otherdetails_nonce' ); 
          $this->field_generator( $post );
        }

        public function field_generator( $post ) {
          $output = '';
          foreach ( $this->fields as $field ) {
            $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $meta_value = get_post_meta( $post->ID, $field['id'], true );
            if ( empty( $meta_value ) ) {
              if ( isset( $field['default'] ) ) {
                $meta_value = $field['default'];
              }
            }
            switch ( $field['type'] ) {
              case 'select':
              $input = sprintf(
                '<select id="%s" name="%s">',
                $field['id'],
                $field['id']
              );
              foreach ( $field['options'] as $key => $value ) {
                $field_value = !is_numeric( $key ) ? $key : $value;
                $input .= sprintf(
                  '<option %s value="%s">%s</option>',
                  $meta_value === $field_value ? 'selected' : '',
                  $field_value,
                  $value
                );
              }
              $input .= '</select>';
              break;
        
              default:
                $input = sprintf(
                '<input %s id="%s" name="%s" type="%s" value="%s">',
                $field['type'] !== 'color' ? 'style="width: 100%"' : '',
                $field['id'],
                $field['id'],
                $field['type'],
                $meta_value
              );
            }
            $output .= $this->format_rows( $label, $input );
          }
          echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
        }

        public function format_rows( $label, $input ) {
          return '<div style="margin-top: 10px;"><strong>'.$label.'</strong></div><div>'.$input.'</div>';
        }
        
        public function save_fields( $post_id ) {
          if ( !isset( $_POST['job_otherdetails_nonce'] ) ) {
            return $post_id;
          }
          $nonce = $_POST['job_otherdetails_nonce'];
          if ( !wp_verify_nonce( $nonce, 'job_otherdetails_data' ) ) {
            return $post_id;
          }
          if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
          }
          foreach ( $this->fields as $field ) {
            if ( isset( $_POST[ $field['id'] ] ) ) {
              switch ( $field['type'] ) {
                case 'email':
                  $_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
                  break;
                case 'text':
                  $_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
                  break;
              }
              update_post_meta( $post_id, $field['id'], $_POST[ $field['id'] ] );
            } else if ( $field['type'] === 'checkbox' ) {
              update_post_meta( $post_id, $field['id'], '0' );
            }
          }
        }

      }

      if (class_exists('job_otherdetails_metabox')) {
        new job_otherdetails_metabox;
      };