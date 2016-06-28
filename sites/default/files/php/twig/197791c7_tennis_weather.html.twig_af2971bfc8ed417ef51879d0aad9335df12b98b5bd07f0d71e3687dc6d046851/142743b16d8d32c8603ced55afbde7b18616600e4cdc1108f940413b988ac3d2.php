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
        $tags = array("for" => 26, "if" => 28, "set" => 29);
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
<br />
<strong>Forecast</strong>
<br />
";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["forecast"]) ? $context["forecast"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 27
            echo "  ";
            // line 28
            echo "  ";
            if (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) == 0)) {
                // line 29
                echo "    ";
                $context["converted_hour"] = "12 AM";
                // line 30
                echo "  ";
            } elseif (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) == 12)) {
                // line 31
                echo "    ";
                $context["converted_hour"] = "12 PM";
                // line 32
                echo "  ";
            } elseif (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) < 12)) {
                // line 33
                echo "    ";
                $context["converted_hour"] = ($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) . " AM");
                // line 34
                echo "  ";
            } else {
                // line 35
                echo "    ";
                $context["converted_hour"] = (($this->getAttribute($this->getAttribute($context["item"], "FCTTIME", array()), "hour", array()) - 12) . " PM");
                // line 36
                echo "  ";
            }
            // line 37
            echo "  ";
            if (((($this->getAttribute($this->getAttribute($context["item"], "temp", array()), "english", array()) >= 94) || ($this->getAttribute($this->getAttribute($context["item"], "wspd", array()), "english", array()) >= 18)) || ($this->getAttribute($context["item"], "pop", array()) >= 40))) {
                // line 38
                echo "    ";
                $context["font_clr"] = "red";
                // line 39
                echo "  ";
            } elseif (((($this->getAttribute($this->getAttribute($context["item"], "temp", array()), "english", array()) >= 90) || ($this->getAttribute($this->getAttribute($context["item"], "wspd", array()), "english", array()) >= 12)) || ($this->getAttribute($context["item"], "pop", array()) >= 30))) {
                // line 40
                echo "    ";
                $context["font_clr"] = "orange";
                // line 41
                echo "  ";
            } else {
                // line 42
                echo "    ";
                $context["font_clr"] = "green";
                // line 43
                echo "  ";
            }
            // line 44
            echo "  <font color=";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["font_clr"]) ? $context["font_clr"] : null), "html", null, true));
            echo "><b>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["converted_hour"]) ? $context["converted_hour"] : null), "html", null, true));
            echo "</b>&emsp;";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "temp", array()), "english", array()), "html", null, true));
            echo " &deg;F&emsp;Wind: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "wspd", array()), "english", array()), "html", null, true));
            echo " mph&emsp;Chance of precipitation: ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "pop", array()), "html", null, true));
            echo "%</font>
  <br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "<small>";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["timestamp"]) ? $context["timestamp"] : null), "html", null, true));
        echo "</small>
<br /><br />
</div>
<strong>MySQL</strong><br />
";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["database_test"]) ? $context["database_test"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 52
            echo "  ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["item"], "html", null, true));
            echo "<br />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "<br />
<br />
<br />
<small>Debug:</small><br />
";
        // line 58
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["debug_info"]) ? $context["debug_info"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
            // line 59
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
        return array (  177 => 59,  173 => 58,  167 => 54,  158 => 52,  154 => 51,  146 => 47,  128 => 44,  125 => 43,  122 => 42,  119 => 41,  116 => 40,  113 => 39,  110 => 38,  107 => 37,  104 => 36,  101 => 35,  98 => 34,  95 => 33,  92 => 32,  89 => 31,  86 => 30,  83 => 29,  80 => 28,  78 => 27,  74 => 26,  67 => 22,  63 => 21,  57 => 20,  49 => 15,  43 => 13,);
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
/* <br />*/
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
/*   {% if item.temp.english >= 94 or item.wspd.english >= 18 or item.pop >= 40 %}*/
/*     {% set font_clr = "red" %}*/
/*   {% elseif item.temp.english >= 90 or item.wspd.english >= 12 or item.pop >= 30 %}*/
/*     {% set font_clr = "orange" %}*/
/*   {% else %}*/
/*     {% set font_clr = "green" %}*/
/*   {% endif %}*/
/*   <font color={{ font_clr }}><b>{{ converted_hour }}</b>&emsp;{{item.temp.english}} &deg;F&emsp;Wind: {{ item.wspd.english }} mph&emsp;Chance of precipitation: {{ item.pop }}%</font>*/
/*   <br />*/
/* {% endfor %}*/
/* <small>{{ timestamp }}</small>*/
/* <br /><br />*/
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
