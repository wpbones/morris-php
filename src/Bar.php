<?php

namespace WPKirk\MorrisPHP;

use WPKirk\MorrisPHP\Chart;
use WPKirk\MorrisPHP\ChartTypes;

/**
 * Morris Bar Chart
 *
 * @class           MorrisBarChart
 * @author          =undo= <info@wpxtre.me>
 * @copyright       Copyright (C) 2012-2014 wpXtreme Inc. All Rights Reserved.
 * @date            2014-04-01
 * @version         1.0.0
 *
 */
class Bar extends Chart
{

  protected $barSizeRatio = 0.75;

  protected $barGap = 3;

  protected $barOpacity = 1.0;

  protected $barRadius = [ 0, 0, 0, 0 ];

  protected $xLabelMargin = 50;

  /**
   * Array containing colors for the series bars.
   *
   * @brief Bars colors
   *
   * @var array $barColors
   */
  protected $barColors = [
    '#0b62a4',
    '#7a92a3',
    '#4da74d',
    '#afd8f8',
    '#edc240',
    '#cb4b4b',
    '#9440ed'
  ];

  /**
   * Set to true to draw bars stacked vertically.
   *
   * @brief Stacked
   *
   * @var bool $stacked
   */
  protected $stacked = true;

  /**
   * Create an instance of MorrisBarChart class
   *
   * @param string $element_id The element id
   *
   */
  public function __construct( $element_id )
  {
    parent::__construct( $element_id, ChartTypes::BAR );
  }
}