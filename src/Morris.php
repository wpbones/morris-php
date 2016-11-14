<?php

namespace WPKirk\MorrisPHP;

use WPKirk\WPBones\Support\Str;

class ChartTypes
{

  const LINE  = 'Line';
  const BAR   = 'Bar';
  const DONUT = 'Donut';
  const AREA  = 'Area';
}

class Morris
{

  /**
   * Type of chart. This value is used in Javascript Morris method
   *
   * @brief Chart
   *
   * @var string $__chart_type
   */
  protected $__chart_type = ChartTypes::LINE;

  /**
   * The ID of (or a reference to) the element into which to insert the graph.
   * Note: this element must have a width and height defined in its styling.
   *
   * @brief Element
   *
   * @var string $element
   */
  protected $element = '';

  /**
   * The data to plot. This is an array of objects, containing x and y attributes as described by the xkey and ykeys
   * options. Note: the order in which you provide the data is the order in which the bars are displayed.
   *
   * Note 2: if you need to update the plot, use the setData method on the object that Morris.Bar
   * returns (the same as with line Chart).
   *
   * @brief Data
   *
   * @var array $data
   */
  protected $data = [];

  /**
   * Create an instance of Morris class
   *
   * @brief Construct
   *
   * @param string $element_id The element id
   * @param string $chart      Optional. Chart Type of chart. Default ChartTypes::LINE
   *
   * @return Morris
   */
  public function __construct( $element_id, $chart = ChartTypes::LINE )
  {
    $this->element      = $element_id;
    $this->__chart_type = $chart;
  }

  /**
   * Return the array of this object
   *
   * @brief Array
   *
   * @return array
   */
  public function toArray()
  {
    $return = [];
    foreach ( $this as $property => $value ) {
      if ( '__' == substr( $property, 0, 2 ) || '' === $value || is_null( $value ) || ( is_array( $value ) && empty( $value ) ) ) {
        continue;
      }
      $return[ $property ] = $value;
    }

    return $return;
  }

  /**
   * Return the jSON encode of this chart
   *
   * @brief JSON
   *
   * @return string
   */
  public function toJSON()
  {
    return json_encode( $this->toArray() );
  }

  public function __toString()
  {
    ob_start();
    ?>
    <script type="text/javascript">
      jQuery( function( $ )
      {
        "use strict";

        if( !$( "#<?php echo $this->element ?>" ).is( ":visible" ) ) {
          return;
        }

        Morris.<?php echo $this->__chart_type ?>(
          <?php echo $this->toJSON() ?>
        );
      } );
    </script>
    <?php
    $buffer = ob_get_contents();
    ob_end_clean();

    return $buffer;
  }

  public function __get( $name )
  {
    foreach ( $this as $key => $value ) {
      if ( $name == $key ) {
        return $this->{$key};
      }
    }

    $method = 'get' . Str::studly( $name ) . 'Attribute';
    if ( method_exists( $this, $method ) ) {
      return call_user_func( [ $this, $method ] );
    }
  }

  public function __call( $name, $arguments )
  {
    foreach ( $this as $key => $value ) {
      if ( $name == $key ) {
        $this->{$key} = $arguments[ 0 ];

        return $this;
      }
    }
  }

  public static function __callStatic( $name, $arguments )
  {
    $instance = null;

    switch ( $name ) {
      case 'area':
        $instance = new Area( $arguments[ 0 ] );
        break;
      case 'bar':
        $instance = new Bar( $arguments[ 0 ] );
        break;
      case 'donut':
        $instance = new Donut( $arguments[ 0 ] );
        break;
      case 'line':
        $instance = new Line( $arguments[ 0 ] );
        break;
    }

    return $instance;
  }

  public static function enqueue()
  {
    // morris
    wp_enqueue_style( 'morris-css', '//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css',
                      [],
                      WPKirk()->Version );

    wp_enqueue_script( 'raphael', '//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
                       [ 'jquery' ],
                       WPKirk()->Version,
                       true );
    wp_enqueue_script( 'morris-js', '//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js',
                       [ 'raphael' ],
                       WPKirk()->Version,
                       true );
  }

}