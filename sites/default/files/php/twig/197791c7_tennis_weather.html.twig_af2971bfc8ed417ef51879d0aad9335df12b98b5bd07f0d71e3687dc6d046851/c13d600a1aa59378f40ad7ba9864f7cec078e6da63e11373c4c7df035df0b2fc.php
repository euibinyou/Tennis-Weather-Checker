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
        $tags = array("for" => 25, "if" => 27, "set" => 28);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for', 'if', 'set'),
                array(),
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
        echo "<h1><strong>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["subheading"]) ? $context["subheading"] : null), "html", null, true));
        echo "</strong><h1>
<div>
<p>";
        // line 15
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["summary"]) ? $context["summary"] : null), "html", null, true));
        echo "</p>
</div>
<div>
<strong>Current conditions</strong>
<br />
<img src=\"";
        // line 20
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["current_icon"]) ? $context["current_icon"] : null), "html", null, true));
        echo "\">&ensp;";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "text", array()), "html", null, true));
        echo "<br />
Temperature: ";
        // line 21
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "temp", array()), "html", null, true));
        echo " &deg;F<br />
Windspeed: ";
        // line 22
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["current_cond"]) ? $context["current_cond"] : null), "precip", array()), "html", null, true));
        echo " mph<br />
<strong>Forecast</strong>
<br />
";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forecast"]) ? $context["forecast"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 26
            echo "  ";
            // line 27
            echo "  ";
            if (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) == 0)) {
                // line 28
                echo "    ";
                $context["converted_hour"] = "12 AM";
                // line 29
                echo "  ";
            } elseif (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) == 12)) {
                // line 30
                echo "    ";
                $context["converted_hour"] = "12 PM";
                // line 31
                echo "  ";
            } elseif (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) < 12)) {
                // line 32
                echo "    ";
                $context["converted_hour"] = ($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) . " AM");
                // line 33
                echo "  ";
            } else {
                // line 34
                echo "    ";
                $context["converted_hour"] = (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) - 12) . " PM");
                // line 35
                echo "  ";
            }
            // line 36
            echo "  <b>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["converted_hour"]) ? $context["converted_hour"] : null), "html", null, true));
            echo "</b>&emsp;";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "temp", array()), "english", array()), "html", null, true));
            echo " &deg;F&emsp;Wind: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "wspd", array()), "english", array()), "html", null, true));
            echo " mph&emsp;Chance of precipitation: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "pop", array()), "html", null, true));
            echo "%
  <br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "<small>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["timestamp"]) ? $context["timestamp"] : null), "html", null, true));
        echo "</small>
<br /><br />
</div>
<p><strong>MySQL</strong></p>
<div>
";
        // line 44
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["database_test"]) ? $context["database_test"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 45
            echo "  <p>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["item"], "html", null, true));
            echo "</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "</div>
<br />
<br />
<br />
<small>Debug:</small><br />
";
        // line 52
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 53
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
        return array (  155 => 53,  151 => 52,  144 => 47,  135 => 45,  131 => 44,  122 => 39,  106 => 36,  103 => 35,  100 => 34,  97 => 33,  94 => 32,  91 => 31,  88 => 30,  85 => 29,  82 => 28,  79 => 27,  77 => 26,  73 => 25,  67 => 22,  63 => 21,  57 => 20,  49 => 15,  43 => 13,);
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
/* <h1><strong>{{ subheading }}</strong><h1>*/
/* <div>*/
/* <p>{{ summary }}</p>*/
/* </div>*/
/* <div>*/
/* <strong>Current conditions</strong>*/
/* <br />*/
/* <img src="{{current_icon}}">&ensp;{{ current_cond.text }}<br />*/
/* Temperature: {{ current_cond.temp }} &deg;F<br />*/
/* Windspeed: {{ current_cond.precip }} mph<br />*/
/* <strong>Forecast</strong>*/
/* <br />*/
/* {% for item in forecast %}*/
/*   {# Convert hours from 24 hr format to 12 hr AM/PM format #}*/
/*   {% if item.FCTTIME.hour == 0 %}*/
/*     {% set converted_hour = '12 AM' %}*/
/*   {% elseif item.FCTTIME.hour == 12 %}*/
/*     {% set converted_hour = '12 PM' %}*/
/*   {% elseif item.FCTTIME.hour < 12 %}*/
/*     {% set converted_hour = item.FCTTIME.hour ~ ' AM' %}*/
/*   {% else %}*/
/*     {% set converted_hour = (item.FCTTIME.hour - 12) ~ ' PM' %}*/
/*   {% endif %}*/
/*   <b>{{ converted_hour }}</b>&emsp;{{item.temp.english}} &deg;F&emsp;Wind: {{ item.wspd.english }} mph&emsp;Chance of precipitation: {{ item.pop }}%*/
/*   <br />*/
/* {% endfor %}*/
/* <small>{{ timestamp }}</small>*/
/* <br /><br />*/
/* </div>*/
/* <p><strong>MySQL</strong></p>*/
/* <div>*/
/* {% for item in database_test %}*/
/*   <p>{{ item }}</p>*/
/* {% endfor %}*/
/* </div>*/
/* <br />*/
/* <br />*/
/* <br />*/
/* <small>Debug:</small><br />*/
/* {% for line in debug_info %}*/
/*   <small>{{ line }}</small><br />*/
/* {% endfor %}*/
/* */
