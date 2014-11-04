<?php

namespace Bolt\Extension\Bolt\Discourse;

use Bolt;

class Extension extends \Bolt\BaseExtension
{
    /**
     * Extensions PHP name
     *
     * @var string
     */
    const NAME = "Discourse";

    public function getName()
    {
        return Extension::NAME;
    }

    public function initialize()
    {
        if ($this->app['config']->getWhichEnd() == 'frontend') {
            // Add Twig functions
            $this->addTwigFunction('discourse', 'twigDiscourse');
	          $this->addSnippet('endofhead', 'embedjs');

        }
    }

    /**
     * Return discourse comments div
     *
     * @return \Twig_Markup
     */
    public function twigDiscourse()
    {
    	$str = "<div id=\"discourse-comments\"></div>";
        return new \Twig_Markup($str, 'UTF-8');
    }

    /**
     * Returns a string with the javascript to embed
     *
     * @return String
     */
    public function embedjs()
    {
      return "<script type='text/javascript'>
          var discourseUrl = '" . $this->config['discourseurl'] . "';
                discourseEmbedUrl = window.location.href();

        (function() {
              var d = document.createElement('script'); d.type = 'text/javascript'; d.async = true;
                    d.src = discourseUrl + 'javascripts/embed.js';
                  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(d);
                })();
      </script>";
    }

}
