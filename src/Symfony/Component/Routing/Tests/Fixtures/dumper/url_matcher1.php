<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * ProjectUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class ProjectUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // foo
        if (0 === strpos($pathinfo, '/foo') && preg_match('#^/foo/(?<bar>baz|symfony)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo')), array (  'def' => 'test',));
        }

        if (0 === strpos($pathinfo, '/bar')) {
            // bar
            if (preg_match('#^/bar/(?<foo>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_bar;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar')), array ());
            }
            not_bar:

            // barhead
            if (0 === strpos($pathinfo, '/barhead') && preg_match('#^/barhead/(?<foo>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_barhead;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'barhead')), array ());
            }
            not_barhead:

        }

        if (0 === strpos($pathinfo, '/test')) {
            if (0 === strpos($pathinfo, '/test/baz')) {
                // baz
                if ($pathinfo === '/test/baz') {
                    return array('_route' => 'baz');
                }

                // baz2
                if ($pathinfo === '/test/baz.html') {
                    return array('_route' => 'baz2');
                }

                // baz3
                if ($pathinfo === '/test/baz3/') {
                    return array('_route' => 'baz3');
                }

            }

            // baz4
            if (preg_match('#^/test/(?<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'baz4')), array ());
            }

            // baz5
            if (preg_match('#^/test/(?<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_baz5;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'baz5')), array ());
            }
            not_baz5:

            // baz.baz6
            if (preg_match('#^/test/(?<foo>[^/]++)/$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_bazbaz6;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'baz.baz6')), array ());
            }
            not_bazbaz6:

        }

        // foofoo
        if ($pathinfo === '/foofoo') {
            return array (  'def' => 'test',  '_route' => 'foofoo',);
        }

        // quoter
        if (preg_match('#^/(?<quoter>[\']+)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'quoter')), array ());
        }

        // space
        if ($pathinfo === '/spa ce') {
            return array('_route' => 'space');
        }

        if (0 === strpos($pathinfo, '/a')) {
            if (0 === strpos($pathinfo, '/a/b\'b')) {
                // foo1
                if (preg_match('#^/a/b\'b/(?<foo>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo1')), array ());
                }

                // bar1
                if (preg_match('#^/a/b\'b/(?<bar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar1')), array ());
                }

            }

            // overridden
            if (preg_match('#^/a/(?<var>.*)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'overridden')), array ());
            }

            if (0 === strpos($pathinfo, '/a/b\'b')) {
                // foo2
                if (preg_match('#^/a/b\'b/(?<foo1>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo2')), array ());
                }

                // bar2
                if (preg_match('#^/a/b\'b/(?<bar1>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar2')), array ());
                }

            }

        }

        if (0 === strpos($pathinfo, '/multi')) {
            // helloWorld
            if (0 === strpos($pathinfo, '/multi/hello') && preg_match('#^/multi/hello(?:/(?<who>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'helloWorld')), array (  'who' => 'World!',));
            }

            // overridden2
            if ($pathinfo === '/multi/new') {
                return array('_route' => 'overridden2');
            }

            // hey
            if ($pathinfo === '/multi/hey/') {
                return array('_route' => 'hey');
            }

        }

        // foo3
        if (preg_match('#^/(?<_locale>[^/]++)/b/(?<foo>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo3')), array ());
        }

        // bar3
        if (preg_match('#^/(?<_locale>[^/]++)/b/(?<bar>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'bar3')), array ());
        }

        if (0 === strpos($pathinfo, '/aba')) {
            // ababa
            if ($pathinfo === '/ababa') {
                return array('_route' => 'ababa');
            }

            // foo4
            if (preg_match('#^/aba/(?<foo>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'foo4')), array ());
            }

        }

        $hostname = $this->context->getHost();

        if (preg_match('#^a\\.example\\.com$#s', $hostname, $hostnameMatches)) {
            // route1
            if ($pathinfo === '/route1') {
                return array('_route' => 'route1');
            }

            // route2
            if ($pathinfo === '/c2/route2') {
                return array('_route' => 'route2');
            }

        }

        if (preg_match('#^b\\.example\\.com$#s', $hostname, $hostnameMatches)) {
            // route3
            if ($pathinfo === '/c2/route3') {
                return array('_route' => 'route3');
            }

        }

        if (preg_match('#^a\\.example\\.com$#s', $hostname, $hostnameMatches)) {
            // route4
            if ($pathinfo === '/route4') {
                return array('_route' => 'route4');
            }

        }

        if (preg_match('#^c\\.example\\.com$#s', $hostname, $hostnameMatches)) {
            // route5
            if ($pathinfo === '/route5') {
                return array('_route' => 'route5');
            }

        }

        // route6
        if ($pathinfo === '/route6') {
            return array('_route' => 'route6');
        }

        if (preg_match('#^(?<var1>[^\\.]++)\\.example\\.com$#s', $hostname, $hostnameMatches)) {
            if (0 === strpos($pathinfo, '/route1')) {
                // route11
                if ($pathinfo === '/route11') {
                    return $this->mergeDefaults(array_replace($hostnameMatches, array('_route' => 'route11')), array ());
                }

                // route12
                if ($pathinfo === '/route12') {
                    return $this->mergeDefaults(array_replace($hostnameMatches, array('_route' => 'route12')), array (  'var1' => 'val',));
                }

                // route13
                if (0 === strpos($pathinfo, '/route13') && preg_match('#^/route13/(?<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($hostnameMatches, $matches, array('_route' => 'route13')), array ());
                }

                // route14
                if (0 === strpos($pathinfo, '/route14') && preg_match('#^/route14/(?<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($hostnameMatches, $matches, array('_route' => 'route14')), array (  'var1' => 'val',));
                }

            }

        }

        if (preg_match('#^c\\.example\\.com$#s', $hostname, $hostnameMatches)) {
            // route15
            if (0 === strpos($pathinfo, '/route15') && preg_match('#^/route15/(?<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'route15')), array ());
            }

        }

        if (0 === strpos($pathinfo, '/route1')) {
            // route16
            if (0 === strpos($pathinfo, '/route16') && preg_match('#^/route16/(?<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'route16')), array (  'var1' => 'val',));
            }

            // route17
            if ($pathinfo === '/route17') {
                return array('_route' => 'route17');
            }

        }

        if (0 === strpos($pathinfo, '/a')) {
            // a
            if ($pathinfo === '/a/a...') {
                return array('_route' => 'a');
            }

            if (0 === strpos($pathinfo, '/a/b')) {
                // b
                if (preg_match('#^/a/b/(?<var>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'b')), array ());
                }

                // c
                if (0 === strpos($pathinfo, '/a/b/c') && preg_match('#^/a/b/c/(?<var>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'c')), array ());
                }

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
