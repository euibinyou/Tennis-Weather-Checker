<?php

/* sites/all/modules/custom/tennis_weather/templates/tennis_weather.html.twig */
class __TwigTemplate_661233ecb0ffe2929ba78fd3bfd1bdbd5cbd70a0d497642d26c7de225c6fc084 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("for" => 40);
        $filters = array("raw" => 27);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for'),
                array('raw'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 13
        echo "<style>
#img_div {
  position: relative;
  display: inline;
}
#img_base {
  position: absolute;
  bottom: -10;
  right: -10;
}
</style>
<h1><strong>";
        // line 24
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["subheading"]) ? $context["subheading"] : null), "html", null, true));
        echo "</strong><h1>
<div>
  <p>
    ";
        // line 27
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["summary"]) ? $context["summary"] : null), "today", array())));
        echo "<br />
    ";
        // line 28
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($this->getAttribute((isset($context["summary"]) ? $context["summary"] : null), "hr", array())));
        echo "<br />
  </p>
</div>
<div>
  <strong>Current conditions</strong>
  <br />
  <img src=\"";
        // line 34
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["current_icon"]) ? $context["current_icon"] : null), "html", null, true));
        echo "\">&ensp;";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "text", array()), "html", null, true));
        echo "<br />
  Temperature: ";
        // line 35
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "temp", array()), "html", null, true));
        echo " &deg;F<br />
  Wind: ";
        // line 36
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "precip", array()), "html", null, true));
        echo " mph<br />
  <br />
  <strong>Forecast</strong>
  <br />
  ";
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forecast"]) ? $context["forecast"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["hour"]) {
            // line 41
            echo "    ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->renderVar($context["hour"]));
            echo "<br />
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hour'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "  <small>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["timestamp"]) ? $context["timestamp"] : null), "html", null, true));
        echo "</small>
  <br /><br />
</div>
<div>
  <strong>Radar</strong>
  <br />
  <div id=\"img_div\">
    <img id=\"img_base\" src=\"";
        // line 50
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["radar_gif"]) ? $context["radar_gif"] : null), "html", null, true));
        echo "\" />
    <img id=\"img_sat\" src=\"";
        // line 51
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["map_img"]) ? $context["map_img"] : null), "html", null, true));
        echo "\" />
  </div>
  <br /><br />
</div>
<strong>MySQL</strong><br />
";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["database_test"]) ? $context["database_test"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 57
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["item"], "html", null, true));
            echo "<br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "<br />
<br />
<br />
<small>Debug:</small><br />
";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 64
            echo "  <small>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["line"], "html", null, true));
            echo "</small><br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "sites/all/modules/custom/tennis_weather/templates/tennis_weather.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 64,  147 => 63,  141 => 59,  132 => 57,  128 => 56,  120 => 51,  116 => 50,  105 => 43,  96 => 41,  92 => 40,  85 => 36,  81 => 35,  75 => 34,  66 => 28,  62 => 27,  56 => 24,  43 => 13,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for Tennis Weather Checker.*/
/*  **/
/*  * Available variables:*/
/*  *   - subheading*/
/*  *   - summary*/
/*  *   - weather_text*/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <style>*/
/* #img_div {*/
/*   position: relative;*/
/*   display: inline;*/
/* }*/
/* #img_base {*/
/*   position: absolute;*/
/*   bottom: -10;*/
/*   right: -10;*/
/* }*/
/* </style>*/
/* <h1><strong>{{ subheading }}</strong><h1>*/
/* <div>*/
/*   <p>*/
/*     {{ summary.today|raw }}<br />*/
/*     {{ summary.hr|raw }}<br />*/
/*   </p>*/
/* </div>*/
/* <div>*/
/*   <strong>Current conditions</strong>*/
/*   <br />*/
/*   <img src="{{current_icon}}">&ensp;{{ current_cond.text }}<br />*/
/*   Temperature: {{ current_cond.temp }} &deg;F<br />*/
/*   Wind: {{ current_cond.precip }} mph<br />*/
/*   <br />*/
/*   <strong>Forecast</strong>*/
/*   <br />*/
/*   {% for hour in forecast %}*/
/*     {{ hour|raw }}<br />*/
/*   {% endfor %}*/
/*   <small>{{ timestamp }}</small>*/
/*   <br /><br />*/
/* </div>*/
/* <div>*/
/*   <strong>Radar</strong>*/
/*   <br />*/
/*   <div id="img_div">*/
/*     <img id="img_base" src="{{ radar_gif }}" />*/
/*     <img id="img_sat" src="{{ map_img }}" />*/
/*   </div>*/
/*   <br /><br />*/
/* </div>*/
/* <strong>MySQL</strong><br />*/
/* {% for item in database_test %}*/
/*   {{ item }}<br />*/
/* {% endfor %}*/
/* <br />*/
/* <br />*/
/* <br />*/
/* <small>Debug:</small><br />*/
/* {% for line in debug_info %}*/
/*   <small>{{ line }}</small><br />*/
/* {% endfor %}*/
/* */
