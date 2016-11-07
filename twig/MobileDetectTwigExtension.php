<?php
namespace Grav\Plugin;
use \Mobile_Detect;

class MobileDetectTwigExtension extends \Twig_Extension
{

  /**
  * returns the name of the class if required
  *
  * @return string the name of the class
  */
  public function getName()
  {
      return 'ElanaTwigExtension';
  }

  /**
   * Return a list of all functions.
   *
   * @return array
   */
  public function getFunctions()
  {
      return [
          new \Twig_SimpleFunction('isMobile', [$this, 'isMobile']),
          new \Twig_SimpleFunction('isTablet', [$this, 'isTablet']),
          new \Twig_SimpleFunction('isDesktop', [$this, 'isDesktop']),
          new \Twig_SimpleFunction('library_version', [$this, 'library_version']),
          new \Twig_SimpleFunction('mobile_detect', [$this, 'mobile_detect']),
          new \Twig_SimpleFunction('mobileGrade', [$this, 'mobileGrade']),
          new \Twig_SimpleFunction('getUserAgent', [$this, 'getUserAgent']),
          new \Twig_SimpleFunction('getHttpHeaders', [$this, 'getHttpHeaders']),
          new \Twig_SimpleFunction('isUserAgent', [$this, 'is']),
          new \Twig_SimpleFunction('version', [$this, 'version']),
      ];
  }

  /**
   * Check the version of the given property in the User-Agent.
   * @param  [$property] The name of the property.
   * @return float (eg. 2_0 will return 2.0, 4.3.1 will return 4.31)
   */
  public function version($property)
  {

    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return $detect->version($property);
  }

  /**
   * This method checks for a certain property in the
   * userAgent.
   * @param  [type]  $property [description]
   * @return boolean      [description]
   */
  public function is($property)
  {

    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return $detect->is($property);
  }

  /**
   * Retrieves the HTTP headers.
   *
   * @return array
   */
  public function getHttpHeaders()
  {
    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return $detect->getHttpHeaders();
  }

  /**
   * Retrieve the User-Agent.
   *
   * @return string|null The user agent if it's set.
   */
  public function getUserAgent()
  {

    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return $detect->getUserAgent();
  }

  /**
   * Retrieve the mobile grading, using self::MOBILE_GRADE_* constants.
   *
   * @return string One of the self::MOBILE_GRADE_* constants.
   */
  public function mobileGrade()
  {
    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return $detect->mobileGrade();
   }

  /**
   * Get the current script version.
   * This is useful for the demo.php file,
   * so people can check on what version they are testing
   * for mobile devices.
   *
   * @return string The version number in semantic version format.
   */
  public function library_version() {

      // instantiate Mobile_Detect Object
      $detect = new Mobile_Detect;

      return $detect->getScriptVersion();
  }

  /**
   *
   *
   * @return string
   */
  public function mobile_detect()
  {
    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    // return string value of device type, else return string "desktop"
    return ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'desktop');
  }

  /**
   *
   *
   * @return bool
   */
  public function isMobile()
  {
    // instantiate Mobile_Detect Object
     $detect = new Mobile_Detect;

     return true === $detect->isMobile() && false === $detect->isTablet();
  }

  /**
   *
   *
   * @return bool
   */
  public function isTablet()
  {
    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return true === $detect->isTablet();
  }

  /**
   *
   *
   * @return bool
   */
  public function isDesktop()
  {
    // instantiate Mobile_Detect Object
    $detect = new Mobile_Detect;

    return false === $detect->isMobile() && false === $detect->isTablet();
  }

}
