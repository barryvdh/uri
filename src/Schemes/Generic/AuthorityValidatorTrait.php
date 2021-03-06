<?php
/**
 * League.Uri (http://uri.thephpleague.com)
 *
 * @package   League.uri
 * @author    Ignace Nyamagana Butera <nyamsprod@gmail.com>
 * @copyright 2013-2015 Ignace Nyamagana Butera
 * @license   https://github.com/thephpleague/uri/blob/master/LICENSE (MIT License)
 * @version   4.1.0
 * @link      https://github.com/thephpleague/uri/
 */
namespace League\Uri\Schemes\Generic;

/**
 * A trait to validate the host in a URI context
 *
 * @package League.uri
 * @author  Ignace Nyamagana Butera <nyamsprod@gmail.com>
 * @since   4.0.0
 * @internal
 */
trait AuthorityValidatorTrait
{
    /**
     * @inheritdoc
     */
    abstract protected function getSchemeSpecificPart();

    /**
     * @inheritdoc
     */
    abstract public function getScheme();

    /**
     * @inheritdoc
     */
    abstract public function getHost();

    /**
     * Tell whether the Auth URI is valid
     *
     * @return bool
     */
    protected function isAuthorityValid()
    {
        $pos = strpos($this->getSchemeSpecificPart(), '//');
        if ('' !== $this->getScheme() && 0 !== $pos) {
            return false;
        }

        return !('' === $this->getHost() && 0 === $pos);
    }
}
